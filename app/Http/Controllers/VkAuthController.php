<?php

namespace App\Http\Controllers;

use App\Services\VkAuthService;
use App\Services\VkUserService;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use SocialiteProviders\Manager\Config;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;
use SocialiteProviders\Manager\Contracts\ConfigInterface;

class VkAuthController extends Controller
{
    public $i;
    //public $config;

    /**
     * Redirect the user to the Vk authentication page.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function redirectToProvider(): RedirectResponse
    {
        return Socialite::driver('vkontakte')->stateless()->redirect();
    }

    public function redirectToProviderAdmin()//: RedirectResponse
    {
        \Illuminate\Support\Facades\Config::set('services.vkontakte.redirect', 'http://134.122.71.181/auth/vk/callback-a');
        return Socialite::with('vkontakte')->stateless()->redirect();
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
    )
    {
        try {
            $user = Socialite::driver('vkontakte')->stateless()->user();
            //return response()->json($user);
        } catch (InvalidStateException $e) {  // If returned data is invalid
            return redirect(env('FRONTEND_URL'));
        }
        catch (ClientException $e) { // If access denied
            return redirect(env('FRONTEND_URL'));
        }

        $authUser = $vkAuthService->authFromVK($user->user);
        $vkUserService->setBigAvatarUri($authUser, $user->accessTokenResponseBody['access_token']);
        $token = $vkAuthService->setToken($authUser);

        return response()->json([
            'token' => $token,
            'user' => $authUser,
        ], 200);
    }

    public function handleProviderCallbackAdmin(VkAuthService $vkAuthService)
    {
        try {
            \Illuminate\Support\Facades\Config::set('services.vkontakte.redirect', 'http://134.122.71.181/auth/vk/callback-a');
            $user = Socialite::driver('vkontakte')->stateless()->user();
        } catch (InvalidStateException $e) {  // If returned data is invalid
            return redirect(env('FRONTEND_URL'));
        }
        catch (ClientException $e) { // If access denied
            return redirect(env('FRONTEND_URL'));
        }

        $authUser = $vkAuthService->authFromVK($user->user);
        return redirect('http://134.122.71.181/admin');
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
        ], 200);
    }

}
