package termostato;

/**
 *
 * @author Giovanni Rizza
 */
public class Termostato {
    private final int TMAX = 35;
    private final int TMIN = 7;
    private int actual_temp;
    private int k_aum;
    
    public Termostato(){}

    public Termostato(int actual_temp, int k_aum) {
        this.actual_temp = actual_temp;
        this.k_aum = k_aum;
    }

    public int getActual_temp() {
        return actual_temp;
    }

    public void setActual_temp(int actual_temp) {
        this.actual_temp = actual_temp;
    }

    public int getK_aum() {
        return k_aum;
    }

    public void setK_aum(int k_aum) {
        this.k_aum = k_aum;
    }
   
    public void aumenta(){
        if (this.actual_temp >= TMAX){
            //non succede nulla;
        } 
        else {
            if (this.actual_temp + this.k_aum >= TMAX){
                //non si puo' alzare a oltre 35 gradi..
                //quindi lo mette a 35 gradi
                this.actual_temp = TMAX;
            }
            else {
                this.actual_temp += this.k_aum;
            }
        }
    }
    
    public void diminuisci(){
        if (this.actual_temp <= TMIN){
            //non succede nulla;
        } 
        else {
            if (this.actual_temp - this.k_aum <= TMIN){
                //non si puo' abbassare a meno di 7.
                //quindi lo mette a 7 gradi
                this.actual_temp = TMIN;
            }
            else {
                this.actual_temp -= this.k_aum;
            }
        }
    }
    
    
}
