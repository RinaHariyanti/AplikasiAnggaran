 describe('empty spec', () => {
    // it('create_rt', () => {
    //   cy.visit('http://127.0.0.1:8000')

    //   cy.get('#email').type ('superadmin@gmail.com')
    //   cy.get('#password-input').type ('password')
    //   cy.get(':nth-child(5) > .btn').click()

    //   cy.get('.ri-home-4-line').click({force:true})

    //   cy.get('.flex-shrink-0 > .btn').click({force:true})
    //   cy.get('#modal-form-add-menu > .modal-dialog > .modal-content > form > .modal-body > .mb-3 > #name').type('RT 09')
    //   cy.get('#modal-form-add-menu > .modal-dialog > .modal-content > form > .modal-footer > .btn-primary').click({force:true})

    // })

    it('edit_rt', () => {
      cy.visit('http://127.0.0.1:8000')

      cy.get('#email').type ('superadmin@gmail.com')
      cy.get('#password-input').type ('password')
      cy.get(':nth-child(5) > .btn').click()

      cy.get('.ri-home-4-line').click({force:true})
      cy.get(':nth-child(1) > :nth-child(3) > .dropdown > .dropdown-menu > :nth-child(1) > .dropdown-item').click({force:true})
      //cy.get('.flex-shrink-0 > .btn').click({force:true})
      cy.get('#modal-form-edit-menu-1 > .modal-dialog > .modal-content > form > .modal-body > .mb-3 > #name').click({force:true})
      cy.get('#modal-form-edit-menu-1 > .modal-dialog > .modal-content > form > .modal-body > .mb-3 > #name').type('RT 07')
      cy.get('#modal-form-edit-menu-1 > .modal-dialog > .modal-content > form > .modal-footer > .btn-primary').click({force:true})

    })

//   it('delete_rt', () => {
//     cy.visit('http://127.0.0.1:8000')

//     cy.get('#email').type ('superadmin@gmail.com')
//     cy.get('#password-input').type ('password')
//     cy.get(':nth-child(5) > .btn').click()

//     cy.get('.ri-home-4-line').click({force:true})
//     cy.get(':nth-child(8) > :nth-child(3) > .dropdown > .dropdown-menu > :nth-child(2) > .dropdown-item').click({force:true})

//   })
  })
