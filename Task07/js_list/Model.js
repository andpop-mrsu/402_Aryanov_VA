import { print, print_err } from './View.js';

export var db;
export var games;
export async function list1(){
    db = await idb.openDB('gamesDb', 1, { upgrade(db) {
        db.createObjectStore('gamesInfo', {keyPath: 'gameId', autoIncrement: true});
    },
    }); 
    games = await db.getAll('gamesInfo');
    if (games.length) {
        print();
      } else {
        print_err();
      }
}