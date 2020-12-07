import { list1, games } from './Model.js';

list1();

export function print(){
    listElem.innerHTML = games.map(games => `<li id="list">ID game: ${games.gameId}, Name: ${games.name}, Size board: ${games.size_board}, Date: ${games.date}, The figure won: ${games.win}, Human's figure: ${games.figure_people}</li>`).join('');
}

export function print_err(){
    listElem.innerHTML = '<li id="list">Сыгранных партий пока нет</li>'
}