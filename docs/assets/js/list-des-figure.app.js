export function list_figure() {
    const listDesFigure = document.getElementById('list-des-figure');
    const EMElements = document.querySelectorAll('em');

    // Create a new unordered list element
    const ul = document.createElement('ul');

    EMElements.forEach(function (element) {

        // Create a new list item element
        const li = document.createElement('li');

        // Create a new anchor element, set its href attribute to the corresponding element's id, set its text content to the element's text content, and insert the new anchor into the list item
        const newAnchor = document.createElement('a');
        newAnchor.href = "#" + element.id;
        newAnchor.textContent = element.textContent;
        newAnchor.style.fontWeight = "500"; // Adding bold font style

        // Append the anchor element to the list item
        li.appendChild(newAnchor);
        newAnchor.style.fontSize = "16px";
        ul.appendChild(li);

    });

    if (listDesFigure) {
        // Insert the unordered list after the table-de-matiere element
        listDesFigure.insertAdjacentElement('afterend', ul);
    }


}



