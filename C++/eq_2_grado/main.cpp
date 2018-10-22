#include <iostream>
#include <cmath>
#include <cstdlib>

using namespace std;

double a, b, c, delta, sol1, sol2;
char conferma;

double calcola_delta()
{
    delta = pow(b, 2)-4*a*c;
    return delta;
}

void visualizza_delta()
{
    cout << "Delta = " << delta <<endl;
}

void equazione()
{
    if (b<0 && c<0)
        cout << a << "x^2 " << b << "x " << c << " = 0"<<endl;
    if (b>0 && c>0)
        cout << a << "x^2 + " << b << "x + " << c << " = 0"<<endl;
    if (b<0 && c>0)
        cout << a << "x^2 " << b << "x + " << c << " = 0"<<endl;
    if (b>0 && c<0)
        cout << a << "x^2 + " << b << "x " << c << " = 0"<<endl;
}

int main()
{
    do
    {
        cout << "Risolutore di equazioni" <<endl;
        cout <<endl;
        cout << "Inserisci il coefficiente di secondo grado: ";
        cin >> a;
        cout << "Inserisci il coefficiente di primo grado: ";
        cin >> b;
        cout << "Inserisci il termine noto: ";
        cin >> c;
        cout <<endl;
        if (a == 0)
            cout << "Errore: l'equazione inserita non " << char(138) << " di secondo grado." <<endl;
        else
        {
            if (c == 0)
            {
                cout << "Una soluzione " << char(138) << " sicuramente x = 0, ma il programma non " << char(138)
                << " in grado di calcolarne l'altra. (Mancanza di un algoritmo)" <<endl;
            }
            else
            {
                if (b == 0 && c == 0)
                {
                    equazione();
                    cout << "Soluzione: x = 0 doppia" <<endl;
                }
                else
                {
                    equazione();
                    calcola_delta();
                    if (delta < 0)
                    {
                        visualizza_delta();
                        cout << "L'equazione non ammette alcuna soluzione nell'insieme dei numeri reali." <<endl;
                    }
                    if (delta == 0)
                    {
                        visualizza_delta();
                        sol1 = -b/(2*a);
                        cout << "Soluzione: x = " << sol1 << " doppia"<<endl;
                    }
                    if (delta > 0)
                    {
                        visualizza_delta();
                        sol1 = (-b+sqrt(delta))/(2*a);
                        sol2 = (-b+sqrt(delta))/(2*a);
                        cout << "Soluzioni: x = " << sol1 << " e x = " << sol2 <<endl;
                    }
                }
            }
        }
        cout << "Vuoi calcolarne ancora? (y/n)" <<endl;
        cin >> conferma;
        system("pause");
        system("cls");

    } while (conferma == 'Y' || conferma == 'y');

    return 0;
}
