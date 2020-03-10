
var types = []
types.push({
  health: 1,
  speed: 160,
  sprite: 'level1',
  shoot: false
});
types.push({
  health: 2,
  speed: 140,
  sprite: 'level4',
  shoot: false
});
types.push({
  health: 3,
  speed: 120,
  sprite: 'level3',
  shoot: true
});
types.push({
  health: 5,
  speed: 100,
  sprite: 'level2',
  shoot: true
});
types.push({
  health: 10,
  speed: 100,
  sprite: 'level5',
  shoot: true
});

EnemyTank = function (index, game, player, bullets, type) {
  var x, y;
  do {
    x = game.world.randomX;
    y = game.world.randomY;
  } while (!(Math.abs(player.x - x) > (400 - score/5) && Math.abs(player.y - y) > (400 - score/5) && Math.abs(player.x - x) < (800 - score/5) && Math.abs(player.y - y) < (800 - score/5) ));

  this.type = type;
  this.speed = types[type].speed;
  this.game = game;
  this.health = types[type].health;
  this.player = player;
  this.alive = true;
  this.bullets = bullets;
  this.fireRate = 1500;
  this.shoot = types[type].shoot;
  this.nextFire = 0;
  this.maxhealth = types[type].health;
  this.tank = game.add.sprite(x, y, types[type].sprite);
  fly = this.tank.animations.add('fly');
  fly.play(10, true);
  this.tank.anchor.set(0.5);

  this.tank.name = index.toString();
  this.healthbar = game.add.sprite(x, y + 35, 'health')
  this.healthbar.anchor.set(0.5);
  this.healthbar.cropEnabled = true;
  game.physics.enable(this.tank, Phaser.Physics.ARCADE);
};

EnemyTank.prototype.damage = function(value) {

  this.health -= value;
  if (this.health <= 0)
  {
    this.alive = false;
    this.healthbar.kill();
    this.tank.kill();

    return true;
  }

  return false;

}

EnemyTank.prototype.rescure = function() {
  var x, y;
  do {
    x = game.world.randomX;
    y = game.world.randomY;
  } while (!(Math.abs(this.player.x - x) > (300 - score/5) && Math.abs(this.player.y - y) > (300 - score/5)));
  this.alive = true;
  this.tank.reset(x,y);
  this.healthbar.reset(x,y);
  this.health = types[this.type].health;
}

EnemyTank.prototype.update = function() {
  this.healthbar.scale.setTo((this.health / this.maxhealth), 5);
  // if (Math.abs(this.player.x - this.tank.x) > (800 - score/2)&& Math.abs(this.player.y - this.tank.y) > (800 - score/2)){
  //   this.damage(10);
  // }
  this.healthbar.x = this.tank.x;
  this.healthbar.y = this.tank.y + 35;
  var speed = this.speed + this.speed* 2 * (this.game.physics.arcade.distanceBetween(this.tank, this.player) / 500)
  this.game.physics.arcade.moveToObject(this.tank, this.player, speed);
  this.tank.rotation = this.game.physics.arcade.angleBetween(this.tank, this.player) - Math.PI/2;
  for (env of BEnv) {
    if(env.type != 'low')
      game.physics.arcade.collide(this.tank, env.sprite);
  }

  if (this.game.physics.arcade.distanceBetween(this.tank, this.player) < 500 && this.shoot)
  {
    if (this.game.time.now > this.nextFire && this.bullets.countDead() > 0)
    {
      this.nextFire = this.game.time.now + this.fireRate;

      var bullet = this.bullets.getFirstDead(false);
      if (bullet){
        bullet.reset(this.tank.x, this.tank.y);
        var rand = Math.random() * 100;
        if(rand < 30)
          bullet.rotation = this.game.physics.arcade.moveToObject(bullet, dummy, 600);
        else
          bullet.rotation = this.game.physics.arcade.moveToObject(bullet, this.player, 400 + score/3);
      }
    }
  }

};
