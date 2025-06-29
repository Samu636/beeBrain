var bee;
var pipes = [];
var beeSprite;
var pipeSprite;
var pipeBody;
var pipeBodyINV;
var pipeTop;
var pipeHeadTop;
var pipeTopINV;
var pipeBottom;
var pipeBottomINV;
var background;
var backgroundX;
var score = 0;
var maxScore = 0;

function preload() {
  pipeSprite = loadImage("/game/grafica/pipefix2.png");
  pipeSpriteInversa = loadImage("/game/grafica/pipefix2inversa.png");
  beeSprite = loadImage("/game/grafica/flappyBee.png");
  background = loadImage("/game/grafica/backgroundfB.png");
  pipeBody = loadImage("/game/grafica/mid.png");
  pipeBodyINV = loadImage("/game/grafica/midrev.png");
  pipeHeadBottom = loadImage("/game/grafica/top.png");
  pipeHeadTop = loadImage("/game/grafica/toprev.png");
  pipeBottom = loadImage("/game/grafica/bottom.png");
  pipeBottomINV = loadImage("/game/grafica/bottomrev.png");
}

function setup() {
  createCanvas(800, 600);
  reset();
}

function draw() {
  //background(0);
  image(background, backgroundX, 0, background.width, height);
  backgroundX -= pipes[0].speed * 0.8;

  //devo controllare quando il lato destro dell'immagine raggiunge la fine, quando accade
  //devo ricaricare l'immagine.. altrimenti finisce il background.
  if (backgroundX <= -background.width + width) {
    image(
      background,
      backgroundX + background.width,
      0,
      background.width,
      height
    );
    if (backgroundX <= -background.width) {
      backgroundX = 0;
    }
  }
  //for (var i = pipes.length - 1; i >= 0; i--)
  for (var i = 0; i < pipes.length; i++) {
    //ciclo per disegnare le pipes
    pipes[i].show();
    pipes[i].update();

    if (pipes[i].pass(bee)) {
      score++;
    }
    if (pipes[i].hits(bee)) {
      console.log("Ho preso la pipe fratelli");
      //dobbiamo implementare la funzione di fine game.
      gameover();
    }
  }
  bee.update();
  bee.show();
  if (frameCount % 70 == 0) {
    //ogni tot frame spawno la pipe
    pipes.push(new Pipe());
  }

  showScore();
}

function showScore() {
  textSize(25);
  textAlign(RIGHT, TOP); // Align text to the right
  text("Points: " + score, width - 10, 32); // Move to top-right
  text("Record: " + maxScore, width - 10, 64); // Move to top-right
}

function gameover() {
  textSize(100);
  textAlign(CENTER, CENTER);
  text("GAMEOVER", width / 2, height / 2);
  maxScore = max(score, maxScore);
  isOver = true;
  noLoop();
}

function reset() {
  isOver = false;
  score = 0;
  backgroundX = 0;
  pipes = [];
  bee = new Bee();
  pipes.push(new Pipe());
  loop();
}

function keyPressed() {
  if (key == " ") {
    bee.up();
    console.log("up");
    if (isOver) reset();
  }
}
