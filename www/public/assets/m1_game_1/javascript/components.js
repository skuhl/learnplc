Quintus.PLCComponents = function(Q) {
    
    Q.component("Armor", {
        added: function() {
            this.entity.p.armor = 0;
        },
        
        SetArmor: function(thisArmor) {
            this.p.armor = thisArmor;
        },
        
        GetArmor: function(){
            return this.p.armor;
        }
        
        //grunt armor 22
        //tank armor 40
        //ranged armor 10
    });
    
    Q.component("Damage", {
        added: function() {
            this.entity.p.damage = 0;
        },
        
        SetDamage: function(thisDamage){
            this.p.damage = thisDamage;
        },
        
        GetDamage: function(){
            return this.p.damage;
        }
        
        //grunt damage 25
        //tank damage 20
        //ranged damage 40
        
    });
};
