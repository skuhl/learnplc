/**
 * Created by Bochao on 7/25/2014.
 */
function m4_ex1_AND() {


    input_pool = [0, 1];
    output_pool = [0];
    wrong_pool = [];

    var row_1 = [1, 1, 1];
    var row_2 = [1, 0, 0];
    var row_3 = [0, 1, 0];
    var row_4 = [0, 0, 0];

    LDL_answer = [row_1, row_2, row_3, row_4];

    verify_m4_ex();
}

function m4_ex2_OR() {


    input_pool = [0, 1];
    output_pool = [0];
    wrong_pool = [];

    var row_1 = [1, 1, 1];
    var row_2 = [1, 0, 1];
    var row_3 = [0, 1, 1];
    var row_4 = [0, 0, 0];

    LDL_answer = [row_1, row_2, row_3, row_4];

    verify_m4_ex();
}

function m4_ex3_NOT() {


    input_pool = [0, 1];
    output_pool = [0];
    wrong_pool = [];

    var row_1 = [1, "N", 0];
    var row_2 = [0, "N", 1];

    LDL_answer = [row_1, row_2];

    verify_m4_ex();
}

function m4_ex4_XOR() {


    input_pool = [0, 1];
    output_pool = [1];
    wrong_pool = [];

    var row_1 = [1, 1, 0];
    var row_2 = [1, 0, 1];
    var row_3 = [0, 1, 1];
    var row_4 = [0, 0, 0];

    LDL_answer = [row_1, row_2, row_3, row_4];

    verify_m4_ex();
}

function m4_ex5_NAND() {


    input_pool = [0, 1];
    output_pool = [1];
    wrong_pool = [];

    var row_1 = [1, 1, 0];
    var row_2 = [1, 0, 1];
    var row_3 = [0, 1, 1];
    var row_4 = [0, 0, 1];

    LDL_answer = [row_1, row_2, row_3, row_4];

    verify_m4_ex();
}

function m4_ex6_NOR() {


    input_pool = [0, 1];
    output_pool = [1];
    wrong_pool = [];

    var row_1 = [1, 1, 0];
    var row_2 = [1, 0, 0];
    var row_3 = [0, 1, 0];
    var row_4 = [0, 0, 1];

    LDL_answer = [row_1, row_2, row_3, row_4];

    verify_m4_ex();
}