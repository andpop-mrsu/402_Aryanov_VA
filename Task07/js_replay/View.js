import { start, id } from './Controller.js';
import { games } from './Model.js';

start();

export function print(){
    var ind = games.map(games => games.gameId);
    var coor = games.map(games => games.array_coord);
    var count = 0;
    
    for (var i = 0; i<= (ind.length-1); i++){
        if(ind[i] == id){
            listElem.innerHTML = `<li id="list">${coor[i].join('<br>')}</li>`;
            count = 1;
        }
    }
    if(count == 0){
        listElem.innerHTML = '<li id="list">Такой сыгранной партии пока нет</li>'
    }
}