const searchBar= document.getElementById('search_input')

function Search(){
    if(!searchBar.value){
        return
    }
    window.location.replace('http://localhost/nettiresepti/search.php?query=' + searchBar.value)
}
function Recipe(id){
    window.location.replace('http://localhost/nettiresepti/recipe.php?id=' + id)
}