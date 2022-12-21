describe('Test login', () => {
    it('email dan password terisi', () => {
      cy.visit('http://127.0.0.1:8000')
      cy.get('#email').type ('superadmin@gmail.com')
      cy.get('#password-input').type ('password')
      cy.get(':nth-child(5) > .btn').click()
    })

    it('email kosong', () => {
      cy.visit('http://127.0.0.1:8000')
      cy.get('#email').type ('')
      cy.get('#password-input').type ('password')
      cy.get(':nth-child(5) > .btn').click()
    })

    it('password kosong', () => {
      cy.visit('http://127.0.0.1:8000')
      cy.get('#email').type ('superadmin@gmail.com')
      cy.get('#password-input').type ('')
      cy.get(':nth-child(5) > .btn').click()
    })

    it('email dan password kosong', () => {
      cy.visit('http://127.0.0.1:8000')
      cy.get('#email').type ('')
      cy.get('#password-input').type ('')
      cy.get(':nth-child(5) > .btn').click()
    })
  })
