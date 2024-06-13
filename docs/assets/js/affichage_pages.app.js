/**
 * Simulation d'affichage de rapport par page
 */

export function affichage_rapport_par_page(){
    // Ajouter un séparateur des pages avant chaque élément h
    // utilisation hr comme séparateur des pages
    document.querySelectorAll('h1')
        .forEach((tag) => {
            const insertBefore = (el, htmlString) =>
                el.insertAdjacentHTML('beforebegin', htmlString);
            insertBefore(tag, "<hr />");
    });
}


/**
 * Convert all h title to link anchor
 */
export function add_anchor_link_to_titles(){

    
    const hElements = document.querySelectorAll("h1,h2,h3");

    for (const h of hElements) {

        const link = document.createElement("a");
        link.href = "#" + h.id;
        link.innerHTML = h.outerHTML
        h.parentNode.replaceChild(link, h);
    }
}