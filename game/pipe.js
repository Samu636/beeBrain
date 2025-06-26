function Pipe() {
  //costruttore pipe

  var spacing = 120;
  var center = random(spacing, height - spacing);
  this.top = center - spacing / 2;
  this.bottom = height - (center + spacing / 2);
  this.x = width;
  this.w = 80; //40
  this.speed = 5;

  this.hihglight = false;
  this.passed = false;

  this.hits = function (bird) {
    // Bird bounding box
    let birdLeft = bird.x - bird.width / 2;
    let birdRight = bird.x + bird.width / 2;
    let birdTop = bird.y - bird.height / 2;
    let birdBottom = bird.y + bird.height / 2;

    // Top pipe bounding box
    let pipeLeft = this.x;
    let pipeRight = this.x + this.w;
    let pipeTopBottom = this.top;

    // Bottom pipe bounding box
    let pipeBottomTop = height - this.bottom;

    // Check collision with top pipe
    let hitTop =
      birdRight > pipeLeft && birdLeft < pipeRight && birdTop < pipeTopBottom;

    // Check collision with bottom pipe
    let hitBottom =
      birdRight > pipeLeft &&
      birdLeft < pipeRight &&
      birdBottom > pipeBottomTop;

    if (hitTop || hitBottom) {
      this.highlight = true;
      return true;
    }

    this.highlight = false;
    return false;
  };
  this.pass = function (bird) {
    if (bird.x > this.x && !this.passed) {
      this.passed = true;
      return true;
    }
    return false;
  };
  // devo trovare un altra soluzione, disegnandole cosi  alcune pipe si schiacciano troppo
  // e non sono belle a vedersi. Potrei mettere un limite(?) o  TODO

  this.drawPipe = function () {
    image(pipeSpriteInversa, this.x, 0, this.w, this.top);
    image(pipeSprite, this.x, height - this.bottom, this.w, this.bottom);
  };

  this.show = function () {
    // fill(255);
    // if (this.hihglight) {
    //   fill(255, 0, 0);
    // }
    // rect(this.x, 0, this.w, this.top); //do le coordinate del rettangolo da disegnare.
    // rect(this.x, height - this.bottom, this.w, this.bottom);
    //push();
    // translate(this.x + this.w / 2, this.bottom);
    // translate(0, -this.spacing);
    this.drawPipe();
    //pop();
  };

  this.update = function () {
    //muovo le pipes.
    this.x -= this.speed;
  };

  this.offscreen = function () {
    //controllo quando vanno offscreen
    if (this.x < -this.w) {
      return true;
    } else {
      return false;
    }
  };
}
