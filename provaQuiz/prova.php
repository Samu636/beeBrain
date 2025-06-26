<html>
<head>
  <title>beeBrain-prova quiz</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
  <link href="../css/bootstrap.min.css" rel="stylesheet" /> -->
  <link rel="stylesheet" type="text/css" href="/prova.css" />
  <script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
</head>
<body class="text-center" id="body-prova-quiz">
  <header>
    <?php
    include("../navbar/navbar.php");
    ?>
  </header>
  <main>
    <div class="container" id="container-login">
      <div class="d-flex justify-content-center h-100">
        <div class="card" id="card-login">
          <div class="card-header">
            <h3 class="card-header-text-prova">quiz di prova</h3>
            <div class="d-flex justify-content-end social_icon">
            </div>
          </div>
          <div class="card-body">
            <div id="app">
              <h1>{{ quiz.title }}</h1> 
                <!-- index is used to check with current question index -->
              <div v-for="(question, index) in quiz.questions">
                <!-- Hide all questions, show only the one with index === to current question index -->
                <div class="mid-card "v-show="index === questionIndex">
                  <p class="question-text">{{ question.text }}</p>
                  <ul>
                    <li v-for="response in question.responses">
                      <label class="response">
                        <!-- The radio button has three new directives -->
                        <!-- v-bind:value sets "value" to "true" if the response is correct -->
                        <!-- v-bind:name sets "name" to question index to group answers by question -->
                        <!-- v-model creates binding with userResponses -->
                        <input class="radio-response"type="radio"
                        v-bind:value="response.correct" 
                        v-bind:name="index" 
                        v-model="userResponses[index]"> {{response.text}}
                      </label>
                    </li>
                  </ul>
                  <!-- The two navigation buttons -->
                  <!-- Note: prev is hidden on first question -->
                  <div class="before-next-button">
                    <button class="btn btn-outline-dark my-2 mr-sm-2" v-if="questionIndex > 0" v-on:click="prev">
                    precedente
                    </button>
                    <button class="btn btn-outline-dark my-2 mr-sm-2" v-on:click="next">
                    successiva
                    </button>
                  </div>
                </div>
              </div>
              <div v-show="questionIndex === quiz.questions.length">
                <h2>
                Quiz terminato
                </h2>
                <p>
                Punteggio totale: {{ score() }} / {{ quiz.questions.length }}
                </p>
                <div><a href="/signupPage/registrazione.php">Registrati</a> per tenere traccia dei tuoi progressi e scegliere tra molti piu quiz!</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- Load Vue script -->
  <!-- Load Vue script -->
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <!-- On load, init Vue -->
  <script>
      // Create a quiz object with a title and two questions.
      // A question has one or more answer, and one or more is valid.
      var quiz = {
        //title: 'Cultura Generale',
        questions: [
          {
            text: "1) Renzo Piano è un architetto",
            responses: [
              {text: 'Vero', correct: true}, 
              {text: 'Falso'}, 
            ]
          }, {
            text: "2) Il termine piramide deriva dalla lingua greca 'pyramis' che significa letteralmente 'della forma del cielo'",
            responses: [
              {text: 'Vero'}, 
              {text: 'Falso', correct: true}, 
            ]
          }, {
            text:"3) Il Coccodrillo marino è il più grande rettile nonché coccodrillo vivente",
            responses: [
              {text: 'Vero', correct: true},
              {text: 'Falso'},
            ] 
          }, {
            text:"4) La prima locomotiva elettrica risale al 1879",
            responses: [
              {text: 'Vero', correct: true},
              {text: 'Falso'}, 
            ]
          },  {
            text:"5) Il linguaggio HTML è un linguaggio di programmazione",
            responses: [
              {text: 'Vero'},
              {text: 'Falso', correct: false}, 
            ]
          },  {
            text:"6) L'Austria confina con la Francia",
            responses: [
              {text: 'Vero'},
              {text: 'Falso', correct: true}, 
            ]
          },  {
            text:"7) La Plata è una città che si trova in Venezuela",
            responses: [
              {text: 'Vero'},
              {text: 'Falso', correct: true}, 
            ]
          },  {
            text:"8) Il fiume Danubio sfocia nel Mar Nero",
            responses: [
              {text: 'Vero', correct: true},
              {text: 'Falso'}, 
            ]
          },  {
            text:"9) La capitale del Brasile è Rio de Janeiro",
            responses: [
              {text: 'Vero'},
              {text: 'Falso', correct: true}, 
            ]
          }, {
            text:"10) Se mi trovo a Tirana sono in Bulgaria",
            responses: [
              {text: 'Vero'},
              {text: 'Falso', correct: true}, 
            ]
          },  {
            text:"11)Il dadaismo è un movimento d'avanguardia del 800'",
            responses: [
              {text: 'Vero'},
              {text: 'Falso', correct: true}, 
            ]
          },  {
            text:"12) Sono noti i tagli nella tela di Lucio Fontana",
            responses: [
              {text: 'Vero', correct: true},
              {text: 'Falso'}, 
            ]
          },  {
            text:"13) Il nome 'Guernica' del capolavoro di Pablo Picasso, deriva da una città bombardata dai nazisti",
            responses: [
              {text: 'Vero', correct: true},
              {text: 'Falso'}, 
            ]
          },  {
            text:"14) Georges Braque fu un esponente del futurismo",
            responses: [
              {text: 'Vero'},
              {text: 'Falso', correct: true}, 
            ]
          },  {
            text:"15) L'Impressionismo nacque a Parigi nel 1874",
            responses: [
              {text: 'Vero', correct: true},
              {text: 'Falso'}, 
            ]
          },  {
            text:"16) La sconfitta di Caporetto avvenne nel 1917",
            responses: [
              {text: 'Vero', correct: true},
              {text: 'Falso'}, 
            ]
          },  {
            text:"17) L'india era una colonia francese",
            responses: [
              {text: 'Vero'},
              {text: 'Falso', correct: true}, 
            ]
          },  {
            text:"18) Lo sbarco in Normandia avvenne il 6 luglio 1944",
            responses: [
              {text: 'Vero'},
              {text: 'Falso', correct: true}, 
            ]
          },  {
            text:"19) Il Risorgimento è un periodo della storia italiana che culmina con l'Unità d'Italia",
            responses: [
              {text: 'Vero', correct: true},
              {text: 'Falso'}, 
            ]
          },  {
            text:"20) La principale conseguenza della Rivoluzione Francese fu l'abolizione della monarchia assoluta ",
            responses: [
              {text: 'Vero', correct: true},
              {text: 'Falso'}, 
            ]
          },  {
            text:"21) Il Piacere è stato il primo libro pubblicato da Gabriele D’Annunzio",
            responses: [
              {text: 'Vero'},
              {text: 'Falso', correct: true}, 
            ]
          },  {
            text:"22) Nel saggio 'L'umorismo' Pirandello distingue il comico dall'umorismo",
            responses: [
              {text: 'Vero', correct: true},
              {text: 'Falso'}, 
            ]
          },  {
            text:"23) 'Non chiederci la parola che squadri da ogni lato' apre la raccolta di poesie di Eugenio Montale 'Ossi di Seppia'",
            responses: [
              {text: 'Vero', correct: true},
              {text: 'Falso'}, 
            ]
          },  {
            text:"24) Edgar Allan Poe fu uno scrittore e poeta inglese",
            responses: [
              {text: 'Vero'},
              {text: 'Falso', correct: true}, 
            ]
          },  {
            text:"25) Il nome della rosa' e' stato scritto da Sandro Veronesi",
            responses: [
              {text: 'Vero'},
              {text: 'Falso', correct: true}, 
            ]
          }
          ]
      };
            
      new Vue({
        el: '#app',
        data: {
          quiz: quiz,
          // Store current question index
          questionIndex: 0,
          // An array initialized with "false" values for each question
          // It means: "did the user answered correctly to the question n?" "no".
          userResponses: Array(quiz.questions.length).fill(false)
        },
        // The view will trigger these methods on click
        methods: {
          // Go to next question
          next: function() {
            this.questionIndex++;
          },
          // Go to previous question
          prev: function() {
            this.questionIndex--;
          },
          // Return "true" count in userResponses
          score: function() {
            return this.userResponses.filter(function(val) { return val }).length;
          }
        }
      });
  </script>
</body>
</html>
