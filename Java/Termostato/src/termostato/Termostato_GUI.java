package termostato;

import javax.swing.JOptionPane;

/**
 *
 * @author Giovanni Rizza
 */
public class Termostato_GUI extends javax.swing.JFrame {
    
    private Termostato t;
    /**
     * Creates new form Termostato_GUI
     */
    public Termostato_GUI() {
        initComponents();
        this.t = new Termostato(7, 1);
    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jLabel1 = new javax.swing.JLabel();
        btnPiu = new javax.swing.JButton();
        btnMeno = new javax.swing.JButton();
        txtIncrement = new javax.swing.JTextField();
        jLabel2 = new javax.swing.JLabel();
        lblGradi = new javax.swing.JLabel();
        btnImposta = new javax.swing.JButton();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        setTitle("Termostato by Giovanni Rizza");
        setBackground(new java.awt.Color(255, 255, 255));
        setCursor(new java.awt.Cursor(java.awt.Cursor.DEFAULT_CURSOR));
        setLocation(new java.awt.Point(200, 200));
        setResizable(false);

        jLabel1.setFont(new java.awt.Font("Arial", 1, 36)); // NOI18N
        jLabel1.setText("TERMOSTATO");

        btnPiu.setText("+");
        btnPiu.setCursor(new java.awt.Cursor(java.awt.Cursor.DEFAULT_CURSOR));
        btnPiu.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnPiuActionPerformed(evt);
            }
        });

        btnMeno.setText("-");
        btnMeno.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnMenoActionPerformed(evt);
            }
        });

        txtIncrement.setText("1");
        txtIncrement.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                txtIncrementActionPerformed(evt);
            }
        });

        jLabel2.setFont(new java.awt.Font("Consolas", 0, 12)); // NOI18N
        jLabel2.setText("Coefficiente di aumento");

        lblGradi.setFont(new java.awt.Font("Calibri", 1, 48)); // NOI18N
        lblGradi.setText("7 °C");

        btnImposta.setText("Imposta");
        btnImposta.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnImpostaActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addComponent(jLabel1)
                    .addComponent(txtIncrement, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.PREFERRED_SIZE, 50, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addGroup(javax.swing.GroupLayout.Alignment.LEADING, layout.createSequentialGroup()
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(btnMeno)
                            .addComponent(btnPiu))
                        .addGap(18, 18, 18)
                        .addComponent(lblGradi))
                    .addGroup(javax.swing.GroupLayout.Alignment.LEADING, layout.createSequentialGroup()
                        .addComponent(jLabel2)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                        .addComponent(btnImposta)))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(jLabel1)
                .addGap(6, 6, 6)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(btnPiu)
                        .addGap(18, 18, 18)
                        .addComponent(btnMeno))
                    .addComponent(lblGradi))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 18, Short.MAX_VALUE)
                .addComponent(txtIncrement, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(btnImposta)
                    .addComponent(jLabel2))
                .addContainerGap())
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void txtIncrementActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txtIncrementActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_txtIncrementActionPerformed

    private void btnPiuActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnPiuActionPerformed
        t.aumenta();
        lblGradi.setText(Integer.toString(t.getActual_temp()) + " °C");
    }//GEN-LAST:event_btnPiuActionPerformed

    private void btnMenoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnMenoActionPerformed
        t.diminuisci();
        lblGradi.setText(Integer.toString(t.getActual_temp()) + " °C");
    }//GEN-LAST:event_btnMenoActionPerformed

    private void btnImpostaActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnImpostaActionPerformed
        try {
            int ku = Integer.parseInt(txtIncrement.getText());
            if (ku <= 0){
                txtIncrement.setText("1");
                t.setK_aum(1);
                JOptionPane.showMessageDialog(null, "Errore: numero negativo o nullo");
            } 
            else {
                t.setK_aum(ku);
            }
        } catch (Exception e) {
            txtIncrement.setText("1");
            t.setK_aum(1);
            String exception;
            exception = "Errore generico di inserimento:\n"+e;
            JOptionPane.showMessageDialog(null, exception);
        }
    }//GEN-LAST:event_btnImpostaActionPerformed


    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btnImposta;
    private javax.swing.JButton btnMeno;
    private javax.swing.JButton btnPiu;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel lblGradi;
    private javax.swing.JTextField txtIncrement;
    // End of variables declaration//GEN-END:variables
}
