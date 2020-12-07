import { print} from './View.js';

export var db;
export var games;
export var gam;
export async function list1(){
    db = await idb.openDB('gamesDb', 1, { upgrade(db) {
        db.createObjectStore('gamesInfo', {keyPath: 'gameId', autoIncrement: true});
    },
    }); 
    games = await db.getAll('gamesInfo');
    print();
}