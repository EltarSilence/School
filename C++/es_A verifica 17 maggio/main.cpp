//RIZZA GIOVANNI 3AI
//verifica A - 17/05/2017

#include <iostream>
#include <stdio.h>
#include <cstdlib>
#include <string> //per gestione stringhe
#define MAX 10

using namespace std;

//strutture
//struttura per ore e minuti
struct time
{
    int ore;
    int minuti;
};

//struttura per dati sui voli
struct aerei
{
    string compagnia;
    string destinazione;
    time orario_partenza;
    time orario_arrivo;
    float prezzo;
}V[MAX];

//PROTOTIPI
void scrivi();
void cerca();

int numero_voli;

int main()
{
    int i, j;
    cout << "=== AEROPORTO DI BRESCIA ===" <<endl;
    cout << endl;
    cout << "Inserisci il numero di voli odierni: "; //dimensione del vettore
    cin >> numero_voli;
	scrivi(); //funzione per inserire i dati
	system("pause");
	system("cls");
	//visualizzazione
	cout << "COMPAGNIA | DESTINAZIONE | PARTENZA - ARRIVO | PREZZO | "<<endl;
    for (j=0; j<numero_voli; j++)
    {
        cout << V[j].compagnia << " | " << V[j].destinazione << " | " << V[j].orario_partenza.ore << ":" << V[j].orario_partenza.minuti << " - " << V[j].orario_arrivo.ore << ":" << V[j].orario_arrivo.minuti<< " | " << V[j].prezzo << " euro | " << endl;
    }
	cerca(); //funzione per cercare i voli con la destinazione
    return 0;
}

void scrivi()
{
    int i; //contatore
	for (i=0; i<numero_voli; i++) //inserimento dati
    {
        cout << "Inserisci la compagnia: ";
        cin >> V[i].compagnia;
        cout << "Inserisci la destinazione: ";
        cin >> V[i].destinazione;
        cout << "Inserisci l'ora di partenza (formato HH): ";
        cin >> V[i].orario_partenza.ore;
        cout << "Inserisci i minuti di partenza (formato MM): ";
        cin >> V[i].orario_partenza.minuti;
        cout << "Inserisci l'ora di arrivo (formato HH): ";
        cin >> V[i].orario_arrivo.ore;
        cout << "Inserisci i minuti di arrivo (formato MM): ";
        cin >> V[i].orario_arrivo.minuti;
        cout << "Inserisci il prezzo: ";
        cin >> V[i].prezzo;
        cout <<endl;
    }
}

void cerca()
{
    //ricerca il volo e se è presente lo visualizza
    int j; //contatore
	string d; //destinazione
	bool presente = false; //booleana per verifica presenza
	cout<<"Inserisci destinazione da cercare: ";
	cin>>d;
	for (j=0; j<numero_voli; j++)
    {
		if(V[j].destinazione==d) //confronto
		{
			presente = true;
			cout <<endl<<V[j].compagnia << " " << V[j].destinazione << " " << V[j].orario_partenza.ore << ":" << V[j].orario_partenza.minuti << " - " << V[j].orario_arrivo.ore << ":" << V[j].orario_arrivo.minuti<<endl;
		}
    }
	if(presente==false) //se non presenti voli...
	{
		cout<<"Non sono presenti voli diretti a "<<d<<endl;
		system("pause");
	}
}
