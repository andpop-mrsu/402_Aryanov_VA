import { winIn, size, name } from './Model.js';


var coor_pc = [];
var coor_pl = [];
var cell_arr = [];
var length_cell = 52;
var move;
var player = "x";
var pc_player = "o";
var size1;
var area = document.getElementById('area');
var cell = document.getElementsByClassName('cell');
var db;
var array_coord = [];
var first;

export async function initializeDatabase() {
    db = await idb.openDB('gamesDb', 1, { upgrade(db) {
        db.createObjectStore('gamesInfo', {keyPath: 'gameId', autoIncrement: true});
    },
    });   
}

async function writeGameInfo(win, figure_people) {
    let date = new Date().toLocaleString();
    let size_board = size + "x" + size;
    try {
        await db.add('gamesInfo', {name, size_board, date, win, figure_people, array_coord});
    } catch(err) {
        throw err;
    }
}

export function game(){
    document.getElementById("area").style.width = length_cell * parseInt(size);
    size1 = parseInt(size) * parseInt(size);

    for(var i = 0; i <= (size1-1); i++){
        area.innerHTML += "<div class='cell' id=" + i + "></div>";
        cell_arr[i] = i + 1;
    }


    for(var i = 0; i<cell.length; i++){
        cell[i].addEventListener('click', pl_move, false);
    }

    function del_list(){
        for(var i = 0; i<cell.length; i++){
            cell[i].removeEventListener('click', pl_move, false);
        }
    }

    function who_one(){
        var pc = Math.floor(Math.random() * (1 - 0 + 1) + 0);
        if(pc === 1){
            pc_player = "x";
            player = "o";
            first = 1;
            pc_move();
        } else{
            pc_player = "o";
            player = "x";
            first = 0;
        }
    }

    who_one();

    function inputCoor(){
        if(coor_pc.length > coor_pl.length){
            coor_pl.push("-");
        }
        if(coor_pc.length < coor_pl.length){
            coor_pc.push("-");
        }
        if(first == 1){
            for(var i = 0; i<=coor_pc.length - 1; i++){
                var text = "Move number " + (i+1) + " | coordinate x = " + coor_pc[i] + " | coordinate o = " + coor_pl[i];
                array_coord.push(text);
            }
        } else{
            for(var i = 0; i<=coor_pc.length - 1; i++){
                var text = "Move number " + (i+1) + " | coordinate x = " + coor_pl[i] + " | coordinate o = " + coor_pc[i];
                array_coord.push(text);
            }
        }
    }

    function pc_move(){
        while(true){
            var rand = Math.floor(Math.random() * cell_arr.length);
            if(cell_arr[rand] != 0) break
        }
        var move = parseInt(cell_arr[rand]) - 1;
        document.getElementById(move).innerHTML = pc_player;
        coor_pc.push(move);
        cell_arr[rand] = 0;
        let win;
        
        if(checkWin(coor_pc)){
            document.getElementById("win").innerHTML = "Won PC!";
            del_list();
            win = "PC";
            inputCoor();
            writeGameInfo(pc_player, player);
        }else{
            var draw = true;
            for(var i in cell){
                if(cell[i].innerHTML == '') draw = false;
            }
            if(draw){;
                document.getElementById("win").innerHTML = "Draw :)";
                del_list();
                win = "PC";
                inputCoor();
                writeGameInfo(win, player);
            }
        }
    }

    function pl_move(){
        var data = [];
        let win;

        if(!this.innerHTML){
            this.innerHTML = player;
            coor_pl.push(parseInt(this.id));
        }else{
            return;
        }

        for(var i in cell){
            if(cell[i].innerHTML == player){
                data.push(parseInt(cell[i].getAttribute('id')));
                cell_arr[i] = 0;
            }
        }
        if(checkWin(coor_pl)){
            document.getElementById("win").innerHTML = "Won " + name + "!";
            del_list();
            win = name;
            inputCoor();
            writeGameInfo(player, player);
        }else{
            var draw = true;
            for(var i in cell){
                if(cell[i].innerHTML == '') draw = false;
            }
            if(draw){
                document.getElementById("win").innerHTML = "Draw :)";
                del_list();
                win = "Draw";
                inputCoor();
                writeGameInfo(win, player);
            }
        }
        if ((checkWin(coor_pl) == false) && (draw == false))
            setTimeout(pc_move, 400);
    }

    function checkWin(data){
        for(var i in winIn){
            var win = true;
            for(var j in winIn[i]){
                var id = winIn[i][j];
                var ind = data.includes(id);
                if(ind == false){
                    win = false;
                }
            }
            if(win) return true;
        }
        return false;
    }
    
}