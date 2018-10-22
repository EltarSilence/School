#include <iostream>
#include <math.h>

using namespace std;

const int m=9;

int calcola_determinante(int n, double T[m][m]);

int main()
{
    double M[m][m];
    int no,r,c;
    do
    {
         cout << "Dimensione matrice quadrata (MAX 9x9):";
         cin >> no;
    }
    while(no>9 || no<1);
    for(r=0;r < no;r++) //caricamento
    for(c=0;c < no;c++)
        {
            cout << "Riga numero " << r+1 << " - Colonna numero " << c+1 << ": "; cin >> M[r][c];
        }
    cout << "Il determinante della matrice e': " << calcola_determinante(no,M);
    return 0;
}

int calcola_determinante(int n, double T[m][m])
{
    int i,j,ic,jc,c=0;
    double valore_determinante=0,t[m][m];

    if(n==1)
        return T[0][0];
    if(n==2)
        return (T[0][0]*T[1][1] - T[0][1]*T[1][0]);

    for(c=0; c < n; c++)
        {//matrice dei minori
            ic=0;
            for(i=1; i < n; i++)
            {
                jc=0;
                for(j=0; j < n; j++)
                {
                    if(j == c) continue;
                    t[ic][jc] = T[i][j];
                    jc++;
                } //fine for j
                ic++;
            } //fine for i
            valore_determinante+= pow(-1, c) * T[0][c] * calcola_determinante(n-1,t);
        } //fine for c
    return valore_determinante;
}
