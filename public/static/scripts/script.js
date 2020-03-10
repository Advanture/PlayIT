var game=new Phaser.Game(800,600,Phaser.AUTO,'phaser-example',{preload:preload,create:create,update:update});function preload(){game.load.spritesheet('tank','static/imgs/tank.png',79,73,8);game.load.image('logo','static/imgs/logo.png');game.load.image('HB','static/imgs/Hotline_Bruevich.png');game.load.image('HBBack','static/imgs/Hotline_Bruevich_Back.png');game.load.image('died','static/imgs/died.png');game.load.image('bullet','static/imgs/laser.png');game.load.image('playerbullet','static/imgs/playerlaser.png');game.load.spritesheet('superbullet','static/imgs/Cisco.png',207,200,24);game.load.image('background','static/imgs/background.png');game.load.audio('tnr','static/imgs/tnr.mp3');game.load.audio('bgmusic','static/imgs/bgmusic.mp3');game.load.audio('intro','static/imgs/bgintro.mp3');game.load.audio('lowpiy','static/imgs/lowpiy.mp3');game.load.audio('damage','static/imgs/damage.mp3');game.load.image('tree','static/imgs/Derevo.png');game.load.image('left_lamp','static/imgs/Fonar_Left.png');game.load.image('right_lamp','static/imgs/Fonar_Right.png');game.load.image('big_bush','static/imgs/Kust_Big.png');game.load.image('small_bush','static/imgs/Kust_Small.png');game.load.image('bench','static/imgs/lavka.png');game.load.image('bucket','static/imgs/Urna.png');game.load.image('level1','static/imgs/level1.png');game.load.spritesheet('level2','static/imgs/level2.png',94,97,3);game.load.spritesheet('level3','static/imgs/level3.png',100,100,4);game.load.image('level4','static/imgs/level4.png');game.load.image('level5','static/imgs/level5.png');game.load.image('supplyHP','static/imgs/supplyHP.png');game.load.image('supplyDMG','static/imgs/supplyPower.png');game.load.image('supplyRad','static/imgs/supplyRad.png');game.load.image('supplyRate','static/imgs/supplyRate.png');game.load.image('supplySpeed','static/imgs/supplySpeed.png');game.load.image('health','static/imgs/health.png');game.load.image('Bar','static/imgs/Bar.png');game.load.image('DMGBar','static/imgs/DMGBar.png');game.load.image('SpeedBar','static/imgs/SpeedBar.png');game.load.image('OrangeBar','static/imgs/OrangeBar.png');game.load.image('FireRateBar','static/imgs/FireRateBar.png');game.load.image('PowerApp','static/imgs/PowerApp.png');game.load.image('TripleBar','static/imgs/TripleBar.png');game.load.image('HealthBar','static/imgs/HealthBar.png');game.load.image('HealthGrid','static/imgs/HealthGrid.png')}
var land;var tank;var anim;var turret;var supplyCount=0;var enemies;var enemys;var enemiesTotal=0;var nextHit=0;var enemiesAlive=0;var damage=1;var logo;var is_paused=!0;var is_music=!0;var currentSpeed=0;var cursors;var supplies;var bullets;var health=10;var fireRate=100;var nextFire=0;var asdasd=0;var powerCounter=0;var fireRateCounter=0;var tripleCounter=0;var speedCounter=0;var bars=[];var superbullets;var superpower=100;var spacekey,enterkey;var tnr;var bgmusic;var superfire_is_started=!1;var superfire_started=0;var intro;var mkey;var lowpiy;var damageMusic;var gameOverScreen;var dummy;var lastspawn=0.5;var gameIntroBack,gameIntroFront;var isIntoMenu=!0;var BEnv=[];var enemyBullets;var bmpText;function create(){game.world.setBounds(0,0,1832,2560);land=game.add.sprite(0,0,'background');land.fixedToCamera=!1;tank=game.add.sprite(916,1280,'tank');tank.anchor.setTo(0.5,0.5);tank.scale.setTo(0.8);anim=tank.animations.add('walk');game.physics.enable(tank,Phaser.Physics.ARCADE);tank.body.maxVelocity.setTo(500,500);tank.body.collideWorldBounds=!0;tank.body.setSize(40,40,25,25)
  tnr=game.add.audio('tnr');bgmusic=game.add.audio('bgmusic',0.3,!0);intro=game.add.audio('intro');lowpiy=game.add.audio('lowpiy',0.5);damageMusic=game.add.audio('damage');game.sound.setDecodedCallback([intro],playintro,this);score=0;enemies=[];enemiesTotal=0;enemiesAlive=0;dummy=game.add.sprite(0,0,'');dummy.checkWorldBounds=!0;supplies=[];BEnv.push(new BodyEnvironment(game,397,489,'small_bush','low'))
  BEnv.push(new BodyEnvironment(game,397,635,'small_bush','low'))
  BEnv.push(new BodyEnvironment(game,397,789,'small_bush','low'))
  BEnv.push(new BodyEnvironment(game,1333,494,'small_bush','low'))
  BEnv.push(new BodyEnvironment(game,1333,641,'small_bush','low'))
  BEnv.push(new BodyEnvironment(game,1333,794,'small_bush','low'))
  BEnv.push(new BodyEnvironment(game,528,1222,'bench','low'))
  BEnv.push(new BodyEnvironment(game,636,1222,'bench','low'))
  BEnv.push(new BodyEnvironment(game,528,1379,'bench','low'))
  BEnv.push(new BodyEnvironment(game,636,1379,'bench','low'))
  BEnv.push(new BodyEnvironment(game,1100,1222,'bench','low'))
  BEnv.push(new BodyEnvironment(game,1212,1222,'bench','low'))
  BEnv.push(new BodyEnvironment(game,1100,1379,'bench','low'))
  BEnv.push(new BodyEnvironment(game,1212,1379,'bench','low'))
  BEnv.push(new BodyEnvironment(game,750,1220,'bucket','low'))
  BEnv.push(new BodyEnvironment(game,750,1379,'bucket','low'))
  BEnv.push(new BodyEnvironment(game,1042,1220,'bucket','low'))
  BEnv.push(new BodyEnvironment(game,1042,1379,'bucket','low'))
  BEnv.push(new BodyEnvironment(game,447,1975,'big_bush','low'))
  BEnv.push(new BodyEnvironment(game,1257,1975,'big_bush','low'))
  enemyBullets=game.add.group();enemyBullets.enableBody=!0;enemyBullets.physicsBodyType=Phaser.Physics.ARCADE;enemyBullets.createMultiple(30,'bullet');enemyBullets.setAll('anchor.x',0.5);enemyBullets.setAll('anchor.y',0.5);enemyBullets.setAll('outOfBoundsKill',!0);enemyBullets.setAll('checkWorldBounds',!0);bullets=game.add.group();bullets.enableBody=!0;bullets.createMultiple(50,'playerbullet',0,!1);bullets.setAll('anchor.x',0.5);bullets.setAll('anchor.y',0.5);bullets.setAll('outOfBoundsKill',!0);bullets.setAll('checkWorldBounds',!0);superbullets=game.add.group();superbullets.enableBody=!0;superbullets.createMultiple(36,'superbullet',0,!1);superbullets.setAll('anchor.x',0.5);superbullets.setAll('anchor.y',0.5);superbullets.setAll('outOfBoundsKill',!0);superbullets.setAll('checkWorldBounds',!0);superbullets.setAll('scale.x',0.2)
  superbullets.setAll('scale.y',0.2)
  tank.bringToTop();BEnv.push(new BodyEnvironment(game,502,577,'','high'))
  BEnv.push(new BodyEnvironment(game,502,849,'','high'))
  BEnv.push(new BodyEnvironment(game,1330,577,'','high'))
  BEnv.push(new BodyEnvironment(game,1330,849,'','high'))
  BEnv.push(new BodyEnvironment(game,415,1393,'','high'))
  BEnv.push(new BodyEnvironment(game,1442,1393,'','high'))
  BEnv.push(new BodyEnvironment(game,492,1660,'','high'))
  BEnv.push(new BodyEnvironment(game,1308,1660,'','high'))
  BEnv.push(new BodyEnvironment(game,406,1868,'','high'))
  BEnv.push(new BodyEnvironment(game,1442,1868,'','high'))
  var style={font:"100px Swiss Siena [RUS by Daymarius]",fill:"#FFF"}
  bmpText=game.add.text(560,50,'0',style);bmpText.fixedToCamera=!0;environment=[];environment.push(game.add.sprite(494,484,'left_lamp'));environment.push(game.add.sprite(494,762,'left_lamp'));environment.push(game.add.sprite(407,1292,'left_lamp'));environment.push(game.add.sprite(407,1786,'left_lamp'));environment.push(game.add.sprite(1328,483,'right_lamp'));environment.push(game.add.sprite(1322,747,'right_lamp'));environment.push(game.add.sprite(1409,1271,'right_lamp'));environment.push(game.add.sprite(1409,1771,'right_lamp'));environment.push(game.add.sprite(417,1446,'tree'));environment.push(game.add.sprite(1236,1451,'tree'));bars.push(new PowerBar(game,10,10,"HealthGrid",55,20,0.7))
  bars.push(new PowerBar(game,10,60,"DMGBar",59,72,0.65))
  bars.push(new PowerBar(game,10,110,"FireRateBar",59,124,0.65))
  bars.push(new PowerBar(game,10,160,"SpeedBar",60,174,0.63))
  bars.push(new PowerBar(game,10,210,"TripleBar",61,225,0.63))
  bars.push(new PowerBar(game,17,270,"PowerApp",53,281,0.65))
  gameIntroBack=game.add.sprite(0,0,'HBBack');gameIntroBack.fixedToCamera=!0;gameIntroFront=game.add.sprite(80,150,'HB');tank.x=0;tank.y=0;game.camera.follow(tank);game.camera.focusOnXY(0,0);spacekey=game.input.keyboard.addKey(Phaser.Keyboard.SPACEBAR);enterkey=game.input.keyboard.addKey(Phaser.Keyboard.ENTER);mkey=game.input.keyboard.addKey(Phaser.Keyboard.M);mkey.onDown.add(changeMusic,this);enterkey.onDown.add(removeIntro,this);cursors=game.input.keyboard.createCursorKeys()}
function changeMusic(){if(is_music){if(intro.isPlaying)
  intro.pause();if(bgmusic.isPlaying)
  bgmusic.pause()}
  is_music=!is_music;if(is_music){if(intro.paused)
    intro.resume();if(bgmusic.paused)
    bgmusic.resume()}}
function removeIntro(){enterkey.onDown.remove(removeIntro,this);gameIntroFront.kill();gameIntroBack.kill();isIntoMenu=!1;tank.x=916;tank.y=1280;openLogo()}
function openLogo(){logo=game.add.sprite(0,0,'logo');logo.fixedToCamera=!0;game.input.onDown.add(removeLogo,this)}
function removeLogo(){is_paused=!1;game.input.onDown.remove(removeLogo,this);game.sound.setDecodedCallback([bgmusic],playbgmusic,this);logo.kill()}
function playbgmusic(){intro.stop();if(is_music)
  bgmusic.play()}
function playintro(){if(is_music)
  intro.play()}
function update(){if(isIntoMenu){gameIntroFront.x=20*Math.cos((game.time.now/5000)*Math.PI)+60
  gameIntroFront.y=20*Math.sin((game.time.now/5000)*Math.PI)+80}
  if(!is_paused){lastspawn-=game.time.physicsElapsed;if(lastspawn<=0&&enemies.length<20){lastspawn=0.50;enemiesTotal+=1;var type=0;var random=parseInt(Math.random()*100);if(random>70){type=0}
  else if(random>55){type=1}
  else if(random>30){type=2}
  else if(random>15){type=3}
  else if(random>0){type=4}
    if(enemies.length<20)
      enemies.push(new EnemyTank(enemiesTotal-1,game,tank,enemyBullets,type));else{for(var i=0;i<20;i++){if(!enemies[i].alive){enemies[i].rescure();break}}}}
    enemiesAlive=0;game.physics.arcade.overlap(enemyBullets,tank,bulletHitPlayer,null,this);game.physics.arcade.overlap(superbullets,enemyBullets,spbhitbullet,null,this);for(var i=0;i<supplies.length;i++){game.physics.arcade.overlap(tank,supplies[i].sup,playerGetSupply,null,this);supplies[i].time_existing-=game.time.physicsElapsed;if(supplies[i].time_existing<=0){supplies[i].sup.kill();supplies[i].alive=!1}}
    for(var i=0;i<enemies.length;i++)
    {if(enemies[i].alive)
    {game.physics.arcade.overlap(superbullets,enemies[i].tank,superBulletHitEnemy,null,this);game.physics.arcade.overlap(bullets,enemies[i].tank,bulletHitEnemy,null,this);game.physics.arcade.overlap(tank,enemies[i].tank,takeDamage,null,this);game.physics.arcade.collide(tank,enemies[i].tank);enemies[i].update();enemiesAlive++}}
    for(env of BEnv){env.update()}
    for(env of environment){if(!is_paused)
      env.bringToTop()}
    for(grid of bars){grid.update()}
    bmpText.text=score;bmpText.bringToTop();if(game.input.activePointer.isDown)
    {fire()}
    if(spacekey.isDown)
    {superfire()}
    if(superfire_is_started){if(game.time.now-superfire_started>3300){game.camera.shake(0.05,750);makeshot()}}
    counterMinus(game.time.physicsElapsed)}
  tank.rotation=game.physics.arcade.angleToPointer(tank)+Math.PI/2;if(cursors.left.isDown||game.input.keyboard.isDown(Phaser.KeyCode.A))
  {if(!anim.isPlaying)
    anim.play(10,!1);if(speedCounter)
    tank.body.velocity.x=-450;else tank.body.velocity.x=-300}
  else if(cursors.right.isDown||game.input.keyboard.isDown(Phaser.KeyCode.D))
  {if(!anim.isPlaying)
    anim.play(10,!1);if(speedCounter)
    tank.body.velocity.x=450;else tank.body.velocity.x=300}
  else tank.body.velocity.x=0;if(cursors.up.isDown||game.input.keyboard.isDown(Phaser.KeyCode.W))
  {if(!anim.isPlaying)
    anim.play(10,!1);if(speedCounter)
    tank.body.velocity.y=-450;else tank.body.velocity.y=-300}
  else if(cursors.down.isDown||game.input.keyboard.isDown(Phaser.KeyCode.S))
  {if(!anim.isPlaying)
    anim.play(10,!1);if(speedCounter)
    tank.body.velocity.y=450;else tank.body.velocity.y=300}
  else tank.body.velocity.y=0;dummy.x=tank.x+tank.body.velocity.x;dummy.y=tank.y+tank.body.velocity.y}
function spawnnew(){enemiesTotal+=1;var type=0;var random=parseInt(Math.random()*100);if(random>70){type=0}
else if(random>55){type=1}
else if(random>30){type=2}
else if(random>15){type=3}
else if(random>0){type=4}
  if(enemies.length<20)
    enemies.push(new EnemyTank(enemiesTotal-1,game,tank,enemyBullets,type));else{for(var i=0;i<20;i++){if(!enemies[i].alive){enemies[i].rescure();break}}}}
function spbhitbullet(spb,bullet){bullet.kill()}
function counterMinus(delta){powerCounter-=delta;speedCounter-=delta;tripleCounter-=delta;fireRateCounter-=delta;if(powerCounter<=0)powerCounter=0;if(speedCounter<=0)speedCounter=0;if(tripleCounter<=0)tripleCounter=0;if(fireRateCounter<=0)fireRateCounter=0}
function bulletHitBody(tank,bullet){bullet.kill()}
function bulletHitEnemy(tank,bullet){bullet.kill();if(powerCounter){damage=2}
else{damage=1}
  var destroyed=enemies[tank.name].damage(damage);score ++;if(destroyed)
  {var rand=Math.random()*100;if(rand<20&&supplyCount<15){supplies.push(new Supply(game,tank,supplyCount));supplyCount++}
  else if(rand<20&&supplyCount==15){var counter=5;do{rand=parseInt(Math.random()*15);counter--}while(supplies[rand].alive&&counter>0)
    supplies[rand].rescure(tank);}
    game.camera.shake(0.003,250);spawnnew()}}
function superBulletHitEnemy(tank,bullet){spawnnew()
  damage=10;var destroyed=enemies[tank.name].damage(damage);var rand=Math.random()*100;if(rand<10&&supplyCount<15){supplies.push(new Supply(game,tank,supplyCount));supplyCount++}
  else if(rand<10&&supplyCount==15){var counter=5;do{rand=parseInt(Math.random()*15);counter--}while(supplies[rand].alive&&counter>0)
    supplies[rand].rescure(tank);}
  game.camera.shake(0.003,250);spawnnew()}
function newGame(){health=10;superpower=100;powerCounter=0;tripleCounter=0;fireRateCounter=0;speedCounter=0;score=0;superfire_is_started=!1;tank.x=916;tank.y=1280;enemiesTotal=0;enemies=[]}
function playerGetSupply(tank,obj){if(obj.key==="supplyHP"){if(health<10)
  health+=1;if(health>10)
  health=10}
  if(obj.key==="supplyDMG"){powerCounter=5}
  if(obj.key==="supplyRad"){tripleCounter=5}
  if(obj.key==="supplyRate"){fireRateCounter=5}
  if(obj.key==="supplySpeed"){speedCounter=5}
  if(superpower<100)
    superpower+=10;obj.kill()
  obj.alive=!1}
function fire(){if(game.time.now>nextFire&&bullets.countDead()>0)
{if(is_music)
  lowpiy.play();if(fireRateCounter){fireRate=100}
else{fireRate=125}
  nextFire=game.time.now+fireRate;var x=30*Math.cos(tank.rotation+0.3-Math.PI/2);var y=30*Math.sin(tank.rotation+0.3-Math.PI/2);var bullet=bullets.getFirstDead(!1);if(bullet){bullet.reset(tank.x+x,tank.y+y);var ax=90*Math.cos(tank.rotation-Math.PI/2);var ay=90*Math.sin(tank.rotation-Math.PI/2);var pointer=game.add.image(tank.x+ax,tank.y+ay,"")
  bullet.rotation=game.physics.arcade.moveToObject(bullet,pointer,750);if(tripleCounter){var xs=100*Math.cos(tank.rotation+0.7-Math.PI/2);var ys=100*Math.sin(tank.rotation+0.7-Math.PI/2);var leftpointer=game.add.image(pointer.x+xs,pointer.y+ys,"");var xs=100*Math.cos(tank.rotation-0.7-Math.PI/2);var ys=100*Math.sin(tank.rotation-0.7-Math.PI/2);var rightpointer=game.add.image(pointer.x+xs,pointer.y+ys,"");var bullet2=bullets.getFirstDead(!1);if(bullet2){bullet2.reset(tank.x+x,tank.y+y);bullet2.rotation=game.physics.arcade.moveToObject(bullet2,leftpointer,750)}
    var bullet3=bullets.getFirstDead(!1);if(bullet3){bullet3.reset(tank.x+x,tank.y+y);bullet3.rotation=game.physics.arcade.moveToObject(bullet3,rightpointer,750)}}}}}
function superfire(){if(superpower===100)
{superpower=0;if(is_music)
  tnr.play();superfire_started=game.time.now;superfire_is_started=!0}}
function makeshot(){superfire_is_started=!1;for(var i=1;i<=36;i++){var x=360*Math.cos(Math.PI*i/18);var y=360*Math.sin(Math.PI*i/18);var bullet=superbullets.getFirstDead(!1);if(bullet){bullet.reset(tank.x,tank.y);var pointer=game.add.image(tank.x+x,tank.y+y,"");bullet.rotation=game.physics.arcade.moveToObject(bullet,pointer,250)}}}
function bulletHitPlayer(tank,bullet){if(is_music)
  damageMusic.play();bullet.kill();if(health>0){if(!superfire_is_started)
  health--;if(health==0)
  gameOver()}}
function takeDamage(tank,enemy){if(game.time.now>nextHit&&!enemy.shoot){if(is_music)
  damageMusic.play();if(health>0){if(!superfire_is_started)
  health--;if(health==0)
  gameOver()}
  nextHit=game.time.now+1000}}
function gameOver(){document.getElementById('total_score').setAttribute('value',score);document.getElementById('h_v').setAttribute('value',md5(MC+score.toString()));bmpText.fixedToCamera=!1;bmpText.reset(350,250);bmpText.fixedToCamera=!0;gameOverScreen=game.add.sprite(0,0,'died');gameOverScreen.fixedToCamera=!0;enemyBullets.forEach(function(c){c.kill()});for(var i=0;i<enemies.length;i++){if(enemies[i].alive){enemies[i].damage(10)}}
  for(sup of supplies){sup.sup.kill();sup.alive=!1}
  is_paused=!0;enterkey.onDown.add(removeGameOver,this);gameOverScreen.bringToTop()}
function removeGameOver(){bmpText.fixedToCamera=!1;bmpText.reset(560,50);bmpText.fixedToCamera=!0;is_paused=!1;enterkey.onDown.remove(removeGameOver,this);game.sound.setDecodedCallback([bgmusic],playbgmusic,this);gameOverScreen.kill();newGame()}
function render(){}
powerapps=['supplyHP','supplyDMG','supplyRate','supplyRad','supplySpeed']
Supply=function(game,enemy,index){this.type=powerapps[index%5];this.time_existing=8;this.sup=game.add.sprite(enemy.x,enemy.y,this.type);this.sup.scale.setTo(0.3,0.3);this.sup.name=index.toString();this.alive=!0;game.physics.enable(this.sup,Phaser.Physics.ARCADE)}
Supply.prototype.rescure=function(enemy){this.time_existing=8;this.alive=!0;this.sup.reset(enemy.x,enemy.y)}
powerbars=['DMGBar','FireRateBar','HealthGrid','SpeedBar','TripleBar']
BodyEnvironment=function(game,x,y,sprite,type){this.type=type;this.sprite=game.add.sprite(x,y,sprite);game.physics.enable(this.sprite,Phaser.Physics.ARCADE);this.game=game;this.sprite.enableBody=!0;this.sprite.body.immovable=!0;this.sprite.body.moves=!1}
BodyEnvironment.prototype.update=function(){if(!is_paused){if(this.type==='high')
  this.sprite.bringToTop();game.physics.arcade.collide(this.sprite,tank);if(this.type==='high')
  game.physics.arcade.overlap(bullets,this.sprite,bulletHitBody,null,this)}}
PowerBar=function(game,xgrid,ygrid,type,xbar,ybar,scale){this.type=type;if(type==="HealthGrid")
  this.bar=game.add.sprite(xbar,ybar,"HealthBar");else if(type==="PowerApp")
  this.bar=game.add.sprite(xbar,ybar,"OrangeBar");else this.bar=game.add.sprite(xbar,ybar,"Bar");this.bar.scale.setTo(0.7)
  this.grid=game.add.sprite(xgrid,ygrid,type)
  this.grid.scale.setTo(scale)
  this.grid.fixedToCamera=!0;this.barheight=this.bar.height;this.barwidth=this.bar.width;this.bar.fixedToCamera=!0;game.physics.enable(this.bar,Phaser.Physics.ARCADE);game.physics.enable(this.grid,Phaser.Physics.ARCADE);this.game=game}
PowerBar.prototype.update=function(){if(this.type==="DMGBar"){this.bar.scale.setTo((powerCounter/5)*0.7,0.7)}
  if(this.type==="FireRateBar"){this.bar.scale.setTo((fireRateCounter/5)*0.7,0.7)}
  if(this.type==="HealthGrid"){this.bar.scale.setTo((health/10)*0.7,0.7)}
  if(this.type==="SpeedBar"){this.bar.scale.setTo((speedCounter/5)*0.7,0.7)}
  if(this.type==="TripleBar"){this.bar.scale.setTo((tripleCounter/5)*0.7,0.7)}
  if(this.type==="PowerApp"){this.bar.scale.setTo((superpower/100)*0.7,0.7)}
  if(!is_paused){this.bar.bringToTop();this.grid.bringToTop()}}