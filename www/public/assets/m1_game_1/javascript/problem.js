/**Manages everything that deals with calculating and checking answers
 * for units
 * 
 * Written by Mitchell Paris 4/12/15
 * With help from Chris Wallis
 */

Quintus.PLCProblem = function(Q) {
	Q.Class.extend("Problem",{
		init: function(unitsArray, difficulty){
			this.difficulty = difficulty;
			this.lowerBound = this.createLowerBound(difficulty);
			this.upperBound = this.createUpperBound(difficulty);
			this.decimal = this.createDecimal();
			this.question = this.calculateQuestion();
			var count = 0;
			while (!this.uniqueProblem( unitsArray )){
				this.decimal = this.createDecimal();
				this.question = this.calculateQuestion();
				count++;
				if(count == 15) {
					this.difficulty += 1;
					this.lowerBound = this.createLowerBound(this.difficulty);
					this.upperBound = this.createUpperBound(this.difficulty);
					count = 0;
				}
			}
			this.answer = this.calculateAnswer();
		},
		createDecimal: function(){
			return (this.lowerBound + Math.floor( (this.upperBound - this.lowerBound + 1) * Math.random() ));
		},
		uniqueProblem: function( unitsArray ){
			for(var i = 0; i < unitsArray.length; i += 1){
				if( unitsArray[i].hasProblem() && unitsArray[i].p.problem.question == this.question )
					return false;
			}
			return true;
		},
		calculateQuestion: function(){
			return this.decimal.toString( this.base );
		},
		calculateAnswer: function(){
			return this.decimal.toString( 2 );
		},
		getQuestion: function(){
			return this.question;
		},
		getAnser: function(){
			return this.answer;
		},
		checkAnswer: function( guess ){
            while ( guess[0] == "0" && guess.length > 1){
                guess = guess.substring(1,guess.length);
            }
            return guess == this.answer;
		}
	});

	Q.Problem.extend("DecimalToBinary", {
		init: function( unitsArray, difficulty ){
			this.base = 10;
			this._super( unitsArray, difficulty );
		},
		createLowerBound: function(difficulty){
			return difficulty * 15;
		},
		createUpperBound: function(difficulty){
			return 15 + difficulty*20;
		},
		getBase: function() {
			return this.base;
		}
	});

	Q.Problem.extend("OctalToBinary", {
		init: function( unitsArray, difficulty ){
			this.base = 8;
			this._super( unitsArray, difficulty );
		},
		createLowerBound: function(difficulty){
			return difficulty*40;
		},
		createUpperBound: function(difficulty){
			return 63 + difficulty*50;
		},
		getBase: function() {
			return this.base;
		}
		});

	Q.Problem.extend("HexToBinary", {
		init: function( unitsArray, difficulty ){
		this.base = 16;
		this._super( unitsArray, difficulty );
		},
		createLowerBound: function(difficulty){
			return 0 + difficulty*(3 * 16);
		},
		createUpperBound: function(difficulty){
			return 16 + difficulty*(4 * 16);
		},
		getBase: function() {
			return this.base;
		}
		});
}
