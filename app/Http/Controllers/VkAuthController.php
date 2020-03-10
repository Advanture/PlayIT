<?php

namespace App\Http\Controllers;

use App\Services\VkAuthService;
use App\Services\VkUserService;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;

class VkAuthController extends Controller
{
    /**
     * Redirect the user to the Vk authentication page.
     *
     * @return RedirectResponse
     */
    public function redirectToProvider(): RedirectResponse
    {
        return Socialite::driver('vkontakte')->stateless()->redirect();
    }

    /**
     * Obtain the user information from Vk.
     *
     * @param VkAuthService $vkAuthService
     * @param VkUserService $vkUserService
     * @return JsonResponse
     */
    public function handleProviderCallback(
        VkAuthService $vkAuthService,
        VkUserService $vkUserService
    ): JsonResponse
    {
        try {
            $user = Socialite::driver('vkontakte')->stateless()->user();
        } catch (InvalidStateException $e) {  // If returned data is invalid
            return redirect()->home();
        } catch (ClientException $e) { // If access denied
            return redirect()->home();
        }

        $authUser = $vkAuthService->authFromVK($user->user);
        $vkUserService->setBigAvatarUri($authUser, $user->accessTokenResponseBody['access_token']);
        $token = $vkAuthService->setToken($authUser);

        return response()->json([
            'token' => $token,
            'user' => $authUser,
        ], 201);
    }

    /**
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        $authUser = auth()->user();
        $authUser->api_token = null;
        $authUser->save();

        return response()->json([
            'message' => 'Успешный выход!'
        ], 201);
    }

}
