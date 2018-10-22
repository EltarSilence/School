package cifratore;

public class Cif {
    private final static char[] M = {'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'};
    private final static char[] m = {'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'};
    private final static char[] n = {'0','1','2','3','4','5','6','7','8','9'};
    private final static char[] s = {'!','@','#','$','%','?','<','>','(',')',' '};

    public static String converti(String toConv){
        
        int k=0;
        boolean cerca=false;
        char[] a = toConv.toCharArray();
        int pos;
        char temp;
        int where;
        for (int i=0; i<toConv.length(); i++){
            temp = a[i];
            where = 0;
            pos = findCapital(temp);
            if (pos < 0){
                pos = findLower(temp);
                
                if (pos < 0){
                    pos = findNumbers(temp);
                    if (pos < 0){
                        pos = findSpecial(temp);
                        where = 3;
                    } else {
                        where = 2;
                    }
                } else {
                    where = 1;
                }
                
            }
            else {
                where = 0;
            }
            
            
            switch(where){
                case 0:
                    if (i %2 == 0){
                        //pari va avanti
                        if (pos + 2 < M.length){
                            pos += 2;
                        }
                        else {
                            pos = (pos + 2)%M.length;
                        }
                    }
                    else {
                        //dispari va indietro
                        if (pos > 1){
                            pos -= 2;
                        }
                        else {
                            pos = M.length + pos - 2;
                        }
                        
                    }
                    
                    a[i] = m[pos];
                                      
                    break;
                case 1:
                    if (i %2 == 0){
                        //pari va avanti
                        if (pos + 2 < m.length){
                            pos += 2;
                        }
                        else {
                            pos = (pos + 2)%m.length;
                        }
                    }
                    else {
                        //dispari va indietro
                        if (pos > 1){
                            pos -= 2;
                        }
                        else {
                            pos = m.length + pos - 2;
                        }
                        
                    }
                    
                    a[i] = M[pos];
                    break;
                case 2:
                    if (i %2 == 0){
                        //pari va avanti
                        if (pos + 2 < n.length){
                            pos += 2;
                        }
                        else {
                            pos = (pos + 2)%n.length;
                        }
                    }
                    else {
                        //dispari va indietro
                        if (pos > 1){
                            pos -= 2;
                        }
                        else {
                            pos = n.length + pos - 2;
                        }
                        
                    }
                    
                    a[i] = n[pos];
                    break;
                case 3:
                    if (i %2 == 0){
                        //pari va avanti
                        if (pos + 2 < s.length){
                            pos += 2;
                        }
                        else {
                            pos = (pos + 2)%s.length;
                        }
                    }
                    else {
                        //dispari va indietro
                        if (pos > 1){
                            pos -= 2;
                        }
                        else {
                            pos = s.length + pos - 2;
                        }
                        
                    }
                    
                    a[i] = s[pos];
                    break;
                default:
                    break;
            }

        }
        
        
        return String.valueOf(a);
        
    }

    private static int findCapital(char c){
        int k=0;
        boolean cerca=false;

        do {
            if (c==M[k]){
                cerca=true;
            }
            else {
                k++;
            }
        } while ((cerca==false) && (k<M.length));

        if (cerca){
            return k;
        }
        else {
            return -1;
        }
    }

    private static int findLower(char c){
        int k=0;
        boolean cerca=false;

        do {
            if (c==m[k]){
                cerca=true;
            }
            else {
                k++;
            }
        } while ((cerca==false) && (k<m.length));

        if (cerca){
            return k;
        }
        else {
            return -1;
        }
    }

    private static int findNumbers(char c){
        int k=0;
        boolean cerca=false;

        do {
            if (c==n[k]){
                cerca=true;
            }
            else {
                k++;
            }
        } while ((cerca==false) && (k<n.length));

        if (cerca){
            return k;
        }
        else {
            return -1;
        }
    }

    private static int findSpecial(char c){
        int k=0;
        boolean cerca=false;

        do {
            if (c==s[k]){
                cerca=true;
            }
            else {
                k++;
            }
        } while ((cerca==false) && (k<s.length));

        if (cerca){
            return k;
        }
        else {
            return -1;
        }
    }        

}
