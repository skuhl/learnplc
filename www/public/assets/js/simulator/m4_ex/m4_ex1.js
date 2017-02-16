/**
 * Created by bochao on 7/15/2014.
 */
// for checking the AND gate test case
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



