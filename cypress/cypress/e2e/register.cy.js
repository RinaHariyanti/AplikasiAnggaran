describe('Test Register', () => {
    it('Semua inputan terisi', () => {
      cy.visit('http://127.0.0.1:8000/register')
      cy.get('#name').type ('Rina Puji Hariyanti')
      cy.get('#useremail').type ('rinayanti1771@gmail.com')
      cy.get('#password').type ('rina1234')
      cy.get('#password_confirmation').type ('rina1234')
      cy.get('#signup').click()
    })

    it('name kosong', () => {
      cy.visit('http://127.0.0.1:8000/register')
      cy.get('#name').type ('')
      cy.get('#useremail').type ('rinayanti1771@gmail.com')
      cy.get('#password').type ('rina1234')
      cy.get('#password_confirmation').type ('rina1234')
      cy.get(':nth-child(5) > .btn').click()
    })

    it('useremail kosong', () => {
      cy.visit('http://127.0.0.1:8000/register')
      cy.get('#name').type ('Rina Puji Hariyanti')
      cy.get('#useremail').type ('')
      cy.get('#password').type ('rina1234')
      cy.get('#password_confirmation').type ('rina1234')
      cy.get(':nth-child(5) > .btn').click()
    })

    it('password kosong', () => {
      cy.visit('http://127.0.0.1:8000/register')
      cy.get('#name').type ('Rina Puji Hariyanti')
      cy.get('#useremail').type ('rinayanti1771@gmail.com')
      cy.get('#password').type ('')
      cy.get('#password_confirmation').type ('rina1234')
      cy.get(':nth-child(5) > .btn').click()
    })

    it('password_confirmation kosong', () => {
      cy.visit('http://127.0.0.1:8000/register')
      cy.get('#name').type ('Rina Puji Hariyanti')
      cy.get('#useremail').type ('rinayanti1771@gmail.com')
      cy.get('#password').type ('rina1234')
      cy.get('#password_confirmation').type ('')
      cy.get('#signup').click()
    })

    it('Semua inputan kosong', () => {
      cy.visit('http://127.0.0.1:8000/register')
      cy.get('#name').type ('')
      cy.get('#useremail').type ('')
      cy.get('#password').type ('')
      cy.get('#password_confirmation').type ('')
      cy.get('#signup').click()
    })
  })
