var gistResults = [];

function Gist(desc, link, language) {
    this.desc = desc;
    this.link = link;
    this.language = language;
};

function pullGists() {
    
    var numPages = document.getElementsByName('numPages')[0].value;
    
    for (var i = 0; i < numPages; i++) {
        
        var url = 'https://api.github.com/gists?page=' + numPages + '&per_page=30';

        var newGist = JSON.parse(this.responseText);
            for (var i = 0; i < newGist.length; i++) {
                var desc = newGist[i].desc;
                var link = newGist[i].html_url;
                var language = "";
                var addGist = new Gist(desc, link, language);
                gistResults.push(addGist);
            }
        showGist(gistResults);
    }
};

function showGist(resultsList) {
    var list = document.getElementById('results');
    var id, desc, link, language;
    
    for (var i in resultsList) {
        id = resultsList[i].link;
        desc = document.createElement('div');
        link = document.createElement('a');
        language = document.createElement('p');

        desc.innerHTML = 'Description: ' + resultsList[i].desc;
        
        link.setAttribute('href', resultsList[i].link);
        link.innerHTML = resultsList[i].link;
        language.innerHTML = 'Language: ' + resultsList[i].language;
        
        
        var addFavoriteButton = document.createElement('button');
        addFavoriteButton.innerHTML = 'Add to Favorites';
        addFavoriteButton.setAttribute('favorites', resultsList[i].link);
        
        addFavoriteButton.onclick = function() {
            var favoriteLinks = this.getAttribute('favorites');
            favoriteGist.favorites.push(favoriteLinks);
            localStorage.setItem('myfav', JSON.stringify(favoriteGist));
            
            desc.id = favoriteLinks.link;
            list.appendChild(desc);
            desc.appendChild(language);
            desc.appendChild(link);
        };
        
        desc.id = resultsList[i].link;
        list.appendChild(desc);
        desc.appendChild(language);
        desc.appendChild(link);
        desc.appendChild(addFavoriteButton);
    }
};


function showFavorites(favoriteResults) {
    var list = document.getElementById('favorites');
    
    for (var i in favoriteResults) {
        var id = favoriteResults.link;
        var desc = document.createElement('div');
        var link = document.createElement('a');
        var language = document.createElement('p');
        
        desc.innerHTML = 'Description: ' + favoriteResults[i].desc;
        
        link.setAttribute('href', favoriteResults[i].link);
        link.innerHTML = favoriteResults[i].link;
        language.innerHTML = 'Language: ' + favoriteResults[i].language;
        
        var removeFavoriteButton = document.createElement('button');
        removeFavoriteButton.innerHTML = 'Remove';
        removeFavoriteButton.setAttribute('removelink', favoriteResults[i].link);
        
        removeFavoriteButton.onclick = function() {
            var removelink = this.getAttribute('removelink');
            desc.id = removelink.link;
            list.removeChild(desc);
            desc.removeChild(language);
            desc.removeChild(link);
        };
        
        desc.id = favoriteResults[i].link;
        list.appendChild(desc);
        desc.appendChild(language);
        desc.appendChild(link);
        desc.appendChild(removeFavoriteButton);
    }
}

window.onload = function() {
    favoriteGist = JSON.parse(localStorage.getItem('myfav'));
    showFavorites(favoriteGist.favorites);
};




