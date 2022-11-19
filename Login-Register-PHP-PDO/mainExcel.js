let questionsData = [
    {
      text: " Des commentaires peuvent être ajoutés aux cellules en utilisant",
      answers: [
        {
          text: " Cliquer droit sur la souris puis « Ajouter un commentaire »",
          isCorrect: false
        },
        {
          text: "Cliquer droit sur la souris puis « Insérer un commentaire »",
          isCorrect: true
        },
        {
          text: "Fichier -> Commentaires",
          isCorrect: false
        }
      ]
    },
    {
      text: "MS-EXCEL est basé sur _____?",
      answers: [
        {
          text: "WINDOWS",
          isCorrect: true
        },
        {
          text: "DOS",
          isCorrect: false
        },
        {
          text: "UNIX",
          isCorrect: false
        },
        {
          text: "je ne sais pas ",
          isCorrect: false
        }
      ]
    },
    {
      text: "Obtenir des données d’une cellule située dans une autre feuille s’appelle",
      answers: [
        {
          text: "Accès",
          isCorrect: false
        },
        {
          text: "Mise à jour",
          isCorrect: false
        },
        {
          text: "Référencement",
          isCorrect: true
        }
      ]
    },
    {
      text: "Lequel des éléments suivants n’est pas un type de données valide dans Excel?",
      answers: [
        {
          text: "Number",
          isCorrect: false
        },
        {
          text: "Character",
          isCorrect: true
        },
        {
          text: "Label",
          isCorrect: false
        },
        
      ]
    },
    {
      text: " La concaténation de texte peut être faite en utilisant _______.",
      answers: [
        {
          text: "Esperluette (&)",
          isCorrect: true
        },
        {
          text: " Apostrophe (‘)",
          isCorrect: false
        },
        {
          text: " Exclamation (!)",
          isCorrect: false
        },
        {
          text: "Dièse (#)",
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


  