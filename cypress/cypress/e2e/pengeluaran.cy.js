describe('Test Add Pengeluaran', () => {
    // it('inputan terisi semua', () => {
    //   cy.visit('http://127.0.0.1:8000')
    //   cy.get('#email').type ('superadmin@gmail.com')
    //   cy.get('#password-input').type ('password')
    //   cy.get(':nth-child(5) > .btn').click()
    //   cy.visit('http://127.0.0.1:8000/pengeluaran')
    //   cy.get('.flex-shrink-0 > .btn').click({force: true})
    //   cy.get('#modal-form-add-menu > .modal-dialog > .modal-content > form > .modal-body > :nth-child(1) > #date').type('2022-10-10')
    //   cy.get('#modal-form-add-menu > .modal-dialog > .modal-content > form > .modal-body > :nth-child(2) > #image').selectFile('Cypress/file/arang.jpg')
    //   cy.get('#nama_rt').type('RT 01')
    //   cy.get('#modal-form-add-menu > .modal-dialog > .modal-content > form > .modal-footer > .btn-primary').click({force: true})
    // })

    // it('inputan date kosong', () => {
    //   cy.visit('http://127.0.0.1:8000')
    //   cy.get('#email').type ('superadmin@gmail.com')
    //   cy.get('#password-input').type ('password')
    //   cy.get(':nth-child(5) > .btn').click()
    //   cy.visit('http://127.0.0.1:8000/pengeluaran')
    //   cy.get('.flex-shrink-0 > .btn').click({force: true})
    //   cy.get('#modal-form-add-menu > .modal-dialog > .modal-content > form > .modal-body > :nth-child(1) > #date').type('')
    //   cy.get('#modal-form-add-menu > .modal-dialog > .modal-content > form > .modal-body > :nth-child(2) > #image').selectFile('Cypress/file/arang.jpg')
    //   cy.get('#nama_rt').type('RT 01')
    //   cy.get('#modal-form-add-menu > .modal-dialog > .modal-content > form > .modal-footer > .btn-primary').click({force: true})
    // })

    // it('inputan file kosong', () => {
    //   cy.visit('http://127.0.0.1:8000')
    //   cy.get('#email').type ('superadmin@gmail.com')
    //   cy.get('#password-input').type ('password')
    //   cy.get(':nth-child(5) > .btn').click()
    //   cy.visit('http://127.0.0.1:8000/pengeluaran')
    //   cy.get('.flex-shrink-0 > .btn').click({force: true})
    //   cy.get('#modal-form-add-menu > .modal-dialog > .modal-content > form > .modal-body > :nth-child(1) > #date').type('2022-10-10')
    //   cy.get('#modal-form-add-menu > .modal-dialog > .modal-content > form > .modal-body > :nth-child(2) > #image').selectFile('')
    //   cy.get('#nama_rt').type('RT 01')
    //   cy.get('#modal-form-add-menu > .modal-dialog > .modal-content > form > .modal-footer > .btn-primary').click({force: true})
    // })

    // it('inputan date dan file kosong', () => {
    //   cy.visit('http://127.0.0.1:8000')
    //   cy.get('#email').type ('superadmin@gmail.com')
    //   cy.get('#password-input').type ('password')
    //   cy.get(':nth-child(5) > .btn').click()
    //   cy.visit('http://127.0.0.1:8000/pengeluaran')
    //   cy.get('.flex-shrink-0 > .btn').click({force: true})
    //   cy.get('#modal-form-add-menu > .modal-dialog > .modal-content > form > .modal-body > :nth-child(1) > #date').type('')
    //   cy.get('#modal-form-add-menu > .modal-dialog > .modal-content > form > .modal-body > :nth-child(2) > #image').selectFile('')
    //   cy.get('#nama_rt').type('RT 01')
    //   cy.get('#modal-form-add-menu > .modal-dialog > .modal-content > form > .modal-footer > .btn-primary').click({force: true})
    // })

      it('input detail', () => {
        cy.visit('http://127.0.0.1:8000')
        cy.get('#email').type ('superadmin@gmail.com')
        cy.get('#password-input').type ('password')
        cy.get(':nth-child(5) > .btn').click()
        cy.visit('http://127.0.0.1:8000/pengeluaran')
        //cy.get('.flex-shrink-0 > .btn').click({force: true})
        cy.get('.card > :nth-child(2) > :nth-child(2) > :nth-child(1) > :nth-child(6) > .dropdown > #dropdownMenuLink > .ri-more-2-fill').click({force: true})
        cy.get('.card > :nth-child(2) > :nth-child(2) > :nth-child(1) > :nth-child(6) > .dropdown > .dropdown-menu > :nth-child(1) > .dropdown-item').click({force:true})
        cy.get('#modal-form-show-detail-5 > .modal-dialog > .modal-content > .modal-footer > .btn-primary').click({force:true})
        cy.wait(2000)
        cy.get('#btn-add-item').click({force: true})
        cy.get('#name').click({force:true})
        cy.get('#name').type('makan')
        cy.get('#price').click({force:true})
        cy.get('#price').type('10000')
        cy.get('#qty').click({force:true})
        cy.get('#qty').type('5')
        cy.get('#amount').click({force:true})
        cy.get('#amount')
        cy.get('form > div > .btn-primary').click({force: true})
      })

    // it('edit pengeluaran', () => {
    //     cy.visit('http://127.0.0.1:8000')
    //     cy.get('#email').type ('superadmin@gmail.com')
    //     cy.get('#password-input').type ('password')
    //     cy.get(':nth-child(5) > .btn').click()
    //     cy.visit('http://127.0.0.1:8000/pengeluaran')
    //     //cy.get('.flex-shrink-0 > .btn').click({force: true})
    //     cy.get('.card > :nth-child(2) > :nth-child(2) > :nth-child(1) > :nth-child(6) > .dropdown > #dropdownMenuLink > .ri-more-2-fill').click({force: true})
    //     cy.get('.card > :nth-child(2) > :nth-child(2) > :nth-child(1) > :nth-child(6) > .dropdown > .dropdown-menu > :nth-child(2) > .dropdown-item').click({force:true})
    //     cy.get('#modal-form-edit-menu-5 > .modal-dialog > .modal-content > form > .modal-body > :nth-child(1) > #date').click({force:true})
    //     cy.get('#modal-form-edit-menu-5 > .modal-dialog > .modal-content > form > .modal-body > :nth-child(1) > #date').type('2022-09-19')
    //     cy.get('#modal-form-edit-menu-5 > .modal-dialog > .modal-content > form > .modal-body > :nth-child(2) > #image').selectFile('file/arang.jpg')
    //     cy.get('#modal-form-edit-menu-5 > .modal-dialog > .modal-content > form > .modal-footer > .btn-primary').click({force:true})
    //   })

    // it('delete pengeluaran', () => {
    //     cy.visit('http://127.0.0.1:8000')
    //     cy.get('#email').type ('superadmin@gmail.com')
    //     cy.get('#password-input').type ('password')
    //     cy.get(':nth-child(5) > .btn').click()
    //     cy.visit('http://127.0.0.1:8000/pengeluaran')
    //     //cy.get('.flex-shrink-0 > .btn').click({force: true})
    //     cy.get('.card > :nth-child(2) > :nth-child(2) > :nth-child(1) > :nth-child(6) > .dropdown > #dropdownMenuLink > .ri-more-2-fill').click({force: true})
    //     cy.get(':nth-child(5) > :nth-child(6) > .dropdown > .dropdown-menu > :nth-child(3) > .dropdown-item').click({force:true})
    //   })
  })
