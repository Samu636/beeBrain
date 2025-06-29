function Pipe() {
  //costruttore pipe

  var spacing = 150;
  var center = random(spacing, height - spacing);
  this.top = center - spacing / 2;
  this.bottom = height - (center + spacing / 2);
  this.x = width;
  this.w = 80; //40
  this.speed = 5;

  this.hihglight = false;
  this.passed = false;

  this.hits = function (bee) {
    // bee bounding box
    let beeLeft = bee.x - bee.width / 2;
    let beeRight = bee.x + bee.width / 2;
    let beeTop = bee.y - bee.height / 2;
    let beeBottom = bee.y + bee.height / 2;

    // Top pipe bounding box
    let pipeLeft = this.x;
    let pipeRight = this.x + this.w;
    let pipeTopBottom = this.top;

    // Bottom pipe bounding box
    let pipeBottomTop = height - this.bottom;

    // Check collision with top pipe
    let hitTop =
      beeRight > pipeLeft && beeLeft < pipeRight && beeTop < pipeTopBottom;

    // Check collision with bottom pipe
    let hitBottom =
      beeRight > pipeLeft &&
      beeLeft < pipeRight &&
      beeBottom > pipeBottomTop;

    if (hitTop || hitBottom) {
      this.highlight = true;
      return true;
    }

    this.highlight = false;
    return false;
  };
  this.pass = function (bee) {
    if (bee.x > this.x && !this.passed) {
      this.passed = true;
      return true;
    }
    return false;
  };
  // devo trovare un altra soluzione, disegnandole cosi  alcune pipe si schiacciano troppo
  // e non sono belle a vedersi. Potrei mettere un limite(?) o  TODO

  // this.drawPipe = function () {

  //   //image(pipeSpriteInversa, this.x, 0, this.w, this.top);
  //   //image(pipeSprite, this.x, height - this.bottom, this.w, this.bottom);
  //   let segmentHeight = pipeBody.height; // Altezza di ogni segmento della pipe
  //   let yTop = 0; // Inizio della pipe superiore
  //   // Disegna la parte superiore della pipe RIPETUTO
  //   while (yTop + segmentHeight < this.top - pipeHeadTop.height) {
  //     image(pipeBody, this.x, yTop, this.w, segmentHeight);
  //     yTop += segmentHeight;
  //   }

  //   image(pipeHeadTop, this.x, this.top -  pipeHeadTop.height, this.w, pipeHeadTop.height); // Disegna l'ultimo segmento superiore
  //   //bottom pipe
  //   let bottomStart = height - this.bottom // Inizio della pipe inferiore
    

  //   //rovesciata
  //   image(pipeTop, this.x, bottomStart, this.w, pipeTop.height);
  //   let yBottom = bottomStart + pipeTop.height;

  // // corpo: da yBottom fino a bottom dello schermo
  // while (yBottom + segmentHeight < height) {
  //   image(pipeBody, this.x, yBottom, this.w, segmentHeight);
  //   yBottom += segmentHeight;
  // }
    
  // };

  this.drawPipe = function () {
  const segH = pipeBody.height;

  // --- PIPE SUPERIORE ---
  const topY = this.top - pipeHeadTop.height;
  const numTilesTop = Math.ceil(topY / segH);
  for (let i = 0; i < numTilesTop; i++) {
    const y = i * segH;
    image(pipeBody, this.x, y, this.w, segH);
  }
  image(pipeHeadTop, this.x, topY, this.w, pipeHeadTop.height);

  // --- PIPE INFERIORE ---
  const yBotStart = height - this.bottom;
  image(pipeHeadBottom, this.x, yBotStart, this.w, pipeHeadBottom.height);

  const spaceBelow = height - (yBotStart + pipeHeadBottom.height);
  const numTilesBot = Math.ceil(spaceBelow / segH);
  for (let i = 0; i < numTilesBot; i++) {
    const y = yBotStart + pipeHeadBottom.height + i * segH;
    image(pipeBody, this.x, y, this.w, segH);
  }
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
    noFill();
  //stroke(255, 0, 0);
  //rect(this.x, 0, this.w, this.top); // Top pipe
  //rect(this.x, height - this.bottom, this.w, this.bottom); // Bottom pipe
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
