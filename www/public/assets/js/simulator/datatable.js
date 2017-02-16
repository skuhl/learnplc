function datatable(){
    this.O0 = []; // output
    this.I1 = []; // input
    this.S2 = []; // status
    this.B3 = []; // binary
    this.T4 = []; // timer
    this.C5 = []; // counter
    this.R6 = []; // control
    this.N7 = []; // integer
    this.F8 = []; // float

    this.length = 100;//maximum number of elements in each data array

    for (var i=0; i<this.length; i++){
        this.N7[i] = 0;
        this.F8[i] = 0;
    }
}