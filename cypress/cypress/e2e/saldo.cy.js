describe('Test Add Pengeluaran', () => {
    it('inputan terisi semua', () => {
      cy.visit('http://127.0.0.1:8000')
      cy.get('#email').type ('superadmin@gmail.com')
      cy.get('#password-input').type ('password')
      cy.get(':nth-child(5) > .btn').click()
      cy.visit('http://127.0.0.1:8000/saldo')
      //cy.get('.ri-bank-line').click({force: true})
    })
  })
