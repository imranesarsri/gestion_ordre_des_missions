import { table_matiere } from "./table_matiere.app.js";
import { list_figure } from "./list-des-figure.app.js";
// import { link_modifier} from "./link_modifier.app.js";
import { affichage_rapport_par_page, add_anchor_link_to_titles } from "./affichage_pages.app.js";

table_matiere();
list_figure();
// link_modifier();
affichage_rapport_par_page();

add_anchor_link_to_titles();

// Activation de code highligh
hljs.highlightAll();


mermaid.init(undefined, document.querySelectorAll(".language-mermaid"));


// TODO js-2 : Création d'un script javascript qui permet d'afficher les figure par numéro 

// TODO js-2 : Création d'un script javascript qui permet d'afficher un tableau des figures



// var plantuml = require('plantuml-js');

document.addEventListener("DOMContentLoaded", function () {
  var elements = document.querySelectorAll('.plantuml');
  for (var i = 0; i < elements.length; i++) {
    var element = elements[i];
    var code = element.textContent;
    plantuml.render(code, function (svg) {
      element.innerHTML = svg;
    });
  }
});