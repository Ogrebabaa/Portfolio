document.addEventListener("DOMContentLoaded", () => {




});

//procede a la requete ajax pur le tri des articles
const selectCat = (id_cat) => {
    // console.log(id_cat);
    let container = document.getElementById("BDD-list-article-container");
    let xhr = new XMLHttpRequest();
    const url = "include/tri_veille.php?cat="+id_cat;
    xhr.open("GET", url, true);

    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) { //request OK !
            //recupere le code html des articles recuperer dans la bdd
            let data = this.responseText;
            //insert les article dans le container
            container.innerHTML = data;
        } 
    };
    
    xhr.send();
}

/**
 * 
 * @param {la categorie d'article} item 
 */
const selected = (item) => {
    item.classList.toggle("current_cat");
    let itemId = item.attributes[0];
    let items = document.getElementsByClassName("tri_nav_item");


    //supprime le style 'current' des autres liens
    for (let index = 0; index < items.length; index++) {
        const element = items[index];

        let elementId = element.attributes[0];
        if (!(elementId === itemId)) {
            element.classList.remove("current_cat");
        }
        
    }
}