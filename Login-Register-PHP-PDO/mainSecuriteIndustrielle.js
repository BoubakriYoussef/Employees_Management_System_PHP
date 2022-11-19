let questionsData = [
  {
    text: "Nombre de régles de sécurité ?",
    answers: [
      {
        text: "5",
        isCorrect: false
      },
      {
        text: "12",
        isCorrect: true
      },
      {
        text: "20",
        isCorrect: false
      }
    ]
  },
  {
    text: "Quel l'Objectif de la formation ?",
    answers: [
      {
        text: "Vous aidez à protéger votre corps et organes",
        isCorrect: true
      },
      {
        text: "Se protéger et protéger les autres collégues",
        isCorrect: false
      },
      {
        text: "Devenir Responsable en sécurité industrielle",
        isCorrect: false
      },
      {
        text: "je ne sais pas ",
        isCorrect: false
      }
    ]
  },
  {
    text: "Les outils obligatoires de la sécurité :",
    answers: [
      {
        text: "Gants ",
        isCorrect: false
      },
      {
        text: "Lunettes",
        isCorrect: false
      },
      {
        text: "Gants + Lunettes + Gillets",
        isCorrect: true
      }
    ]
  },
  {
    text: "Quels sont les avantages de l'application des régles de sécurité ?",
    answers: [
      {
        text: "Se protéger et protéger les autres opérateurs",
        isCorrect: true
      },
      {
        text: "Protéger les autres",
        isCorrect: false
      },
      {
        text: "Protéger soi meme",
        isCorrect: false
      },
      
    ]
  },
  {
    text: "Quel pays est le leader de sécurité ? ",
    answers: [
      {
        text: "Allemagne",
        isCorrect: true
      },
      {
        text: "France",
        isCorrect: false
      },
      {
        text: "Maroc",
        isCorrect: false
      },
      {
        text: "Sénégal",
        isCorrect: false
      }
    ]
  }
];

// variables initialization
let questions = [];
let score = 0,
  answeredQuestions = 0;
let appContainer = document.getElementById("questions-container");
let scoreContainer = document.getElementById("score-container");
scoreContainer.innerHTML = `Score: ${score}/${questionsData.length}`;

/**
 * Shuffles array in place. ES6 version
 * @param {Array} arr items An array containing the items.
 */
function shuffle(arr) {
  for (let i = arr.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [arr[i], arr[j]] = [arr[j], arr[i]];
  }
}

shuffle(questionsData);

// creating questions
for (var i = 0; i < questionsData.length; i++) {
  let question = new Question({
    text: questionsData[i].text,
    answers: questionsData[i].answers
  });

  appContainer.appendChild(question.create());
  questions.push(question);
}

document.addEventListener("question-answered", ({ detail }) => {
  if (detail.answer.isCorrect) {
    score++;
  }

  answeredQuestions++;
  scoreContainer.innerHTML = `Score: ${score}/${questions.length}`;
  detail.question.disable();

  if (answeredQuestions == questions.length) {
    setTimeout(function () {
      alert(`Quiz completed! \nFinal score: ${score}/${questions.length}`);
    }, 100);
  }
});

console.log(questions, questionsData);
