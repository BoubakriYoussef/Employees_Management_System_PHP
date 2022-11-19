let questionsData = [
    {
      text: "Quelle barre est généralement située sous la barre de titre qui fournit des options classées par catégorie?",
      answers: [
        {
          text: "Barre de menu",
          isCorrect: true
        },
        {
          text: "Barre d’état",
          isCorrect: false
        },
        {
          text: "Barre d’outils",
          isCorrect: false
        }
      ]
    },
    {
      text: "Quelle option du menu déroulant « Fichier » est utilisée pour fermer un fichier dans MS Word?",
      answers: [
        {
          text: "Nouveau",
          isCorrect: false
        },
        {
          text: " Quitter",
          isCorrect: false
        },
        {
          text: "Fermer",
          isCorrect: true
        },
        {
          text: "Sortir ",
          isCorrect: false
        }
      ]
    },
    {
      text: "Quelle est l’extension des fichiers créés dans MS-Word 2007-2015",
      answers: [
        {
          text: "RTF",
          isCorrect: false
        },
        {
          text: "DOC",
          isCorrect: false
        },
        {
          text: "DOCX",
          isCorrect: true
        }
      ]
    },
    {
      text: "MS-Office est un...",
      answers: [
        {
          text: "Logiciel applicatifs",
          isCorrect: true
        },
        {
          text: "Logiciel système",
          isCorrect: false
        },
        {
          text: "Système d’exploitation",
          isCorrect: false
        },
        
      ]
    },
    {
      text: " Quel est le plus petit ______ & ______ plus grande taille de police ",
      answers: [
        {
          text: " 8 et 72",
          isCorrect: true
        },
        {
          text: "8 et 68",
          isCorrect: false
        },
        {
          text: " 6 et 72",
          isCorrect: false
        },
        {
          text: "6 et 68",
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
  