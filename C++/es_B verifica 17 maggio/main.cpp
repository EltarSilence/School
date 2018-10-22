#include <iostream>
#include <cstdlib>
#include <string>

using namespace std;

struct spettacoli
{
	int sala;
	string film;
	float prezzo_intero;
	float prezzo_ridotto;
}spettacolo[500];

struct date_spettacoli
{
	int giorno;
	int mese;
	int anno;
}Data[500];

void registra(int &nSpett)
{
	cout << "\n\nNumero di spettacoli da registrare: ";
	cin >> nSpett;

	for (int i = 0; i < nSpett; i++)
	{
		cout << "\n\nRegistrazione spettacolo numero " << i + 1 << ":\n\n";
		cout << "Data:\nInserire giorno: ";
		cin >> Data[i].giorno;
		cout << "Inserire mese: ";
		cin >> Data[i].mese;
		cout << "Inserire anno: ";
		cin >> Data[i].anno;
		cout << "Dati spettacolo:\nInserire numero sala: ";
		cin >> spettacolo[i].sala;
		cout << "Inserire nome film: ";
		cin.ignore();
		getline(cin, spettacolo[i].film);
		cout << "Inserire prezzo intero film: ";
		cin >> spettacolo[i].prezzo_intero;
		cout << "Inserire prezzo ridotto film: ";
		cin >> spettacolo[i].prezzo_ridotto;
		system("cls");
	}
}

void mostra(int &nSpettacoli)
{
	int g, m, a; //Giorno mese anno da ricercare
	bool trovato = false;

	cout << "\n\nRicerca film:\nInserire giorno: ";
	cin >> g;
	cout << "Inserire mese: ";
	cin >> m;
	cout << "Inserire anno: ";
	cin >> a;

	cout << "\n\n\nLista film il " << g << "/" << m << "/" << a << ":\n\n";
	for (int i = 0; i < nSpettacoli; i++)
		if (Data[i].giorno == g && Data[i].mese == m && Data[i].anno == a)
		{
			trovato = true;
			cout << "Film: " << spettacolo[i].film << "\t\tnumero sala: " << spettacolo[i].sala << "\t\tprezzo intero: " << spettacolo[i].prezzo_intero << "\t\tprezzo ridotto: " << spettacolo[i].prezzo_ridotto << "\n";
		}

	if (!trovato)
		cout << "Non e' stato registrato nessun film per il giorno cercato.\n";

	cin.ignore();
	cin.get();
}

int main()
{
	int scelta, nS;

	do
	{
		cout << "Archivio film:\n\n1. Registrare film\n2. Visualizzare dati film secondo la data\n3. Uscita dal programma\nScelta: ";
		cin >> scelta;

		switch (scelta)
		{
		case 1:
			system("cls");
			registra(nS);
			break;
		case 2:
			system("cls");
			mostra(nS);
			break;
		case 3:
			break;
		default:
			cout << "\n\nINPUT INVALIDO\n";
			cin.ignore();
			cin.get();
			break;
		}

		system("cls");
	} while (scelta != 3);

	return 0;
}
