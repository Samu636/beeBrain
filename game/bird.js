function Bird() {
  this.y = height / 2;
  this.x = 64;

  this.gravity = 0.5;
  this.upforce = -15;
  this.velocity = 0;

  this.icon = beeSprite;
  this.width = 60;
  this.height = 60;

  this.show = function () {
    //questa era la prova iniziale senza sprite. Quando era solo una palla bianca
    // fill(255);
    // ellipse(this.x, this.y, 32, 32);
    image(
      this.icon,
      this.x - this.width / 2,
      this.y - this.height / 2,
      this.width,
      this.height
    );
  };

  this.up = function () {
    this.velocity += this.upforce;
  };

  this.update = function () {
    this.velocity += this.gravity;
    this.velocity *= 0.9;
    this.y += this.velocity;

    if (this.y > height) {
      //qui quando l'ape arriva a fine canvas la stoppo.
      this.y = height;
      this.velocity = 0;
    }

    if (this.y < 0) {
      this.y = 0;
      this.velocity = 0;
    }
  };
}
