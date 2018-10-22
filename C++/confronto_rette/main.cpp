/*
Programma che, date 2 rette con coefficienti a,b,c, dice se le due rette sono parallele, perpendicolari,
concidenti, incidenti
*/

#include <iostream>

using namespace std;

int main(){
	double a1,b1,c1,a2,b2,c2,m1,m2,q1,q2;

	//lettura dei coefficienti
	cout<<"Inserisci i coefficienti della prima retta:\n";
	cout<<"a = "; cin>>a1;
	cout<<"b = "; cin>>b1;
	cout<<"c = "; cin>>c1;
	cout<<"\nInserisci i coefficienti della seconda retta:\n";
	cout<<"a = "; cin>>a2;
	cout<<"b = "; cin>>b2;
	cout<<"c = "; cin>>c2;

	if (b1==0 && b2==0){
		if ((c1/a1)!=(c2/a2)){
			cout<<"\nLe rette sono parallele";
		}
		else{
			cout<<"\nLe rette sono coincidenti";
		}
	}
	if (b1==0 && b2!=0){
		if((a2/b2)==0){
			cout<<"\nLe rette sono perpendicolari";
		}
		else{
			cout<<"\nLe rette sono incidenti";
		}
	}
	if (b1!=0 && b2==0){
		if((a1/b1)==0){
			cout<<"\nLe rette sono perpendicolari";
		}
		else{
			cout<<"\nLe rette sono incidenti";
		}
	}

	if (b1!=0 && b2!=0){

	//calcolo m e q delle due rette
	m1=-(a1/b1);
	m2=-(a2/b2);
	q1=c1/a1;
	q2=c2/a2;
		if (m1==m2){
			if (q1==q2){
				cout<<"\nLe rette sono coincidenti";
			}
			else {
				cout<<"\nLe rette sono parallele";
			}
		}
		else{
			if(m1==-(1/m2)||m2==-(1/m1)){
				cout<<"\nLe rette sono perpendicolari";
			}
			else{
				cout<<"\nLe rette sono incidenti";
			}
		}
	}
}
