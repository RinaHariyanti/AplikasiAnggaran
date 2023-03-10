describe('Test Add Pemasukan', () => {
    it('inputan terisi semua', () => {
      cy.visit('http://127.0.0.1:8000')
      cy.get('#email').type ('superadmin@gmail.com')
      cy.get('#password-input').type ('password')
      cy.get(':nth-child(5) > .btn').click()
      cy.visit('http://127.0.0.1:8000/invoice')
      cy.get('#modal-form-add-menu > .modal-dialog > .modal-content > form > .modal-body > :nth-child(1) > #name')
      cy.get('#modal-form-add-menu > .modal-dialog > .modal-content > form > .modal-body > :nth-child(2) > #date')
      cy.get('#modal-form-add-menu > .modal-dialog > .modal-content > form > .modal-body > :nth-child(3) > #nominal')
      cy.get('#modal-form-add-menu > .modal-dialog > .modal-content > form > .modal-body > :nth-child(4) > #nama_rt_id')
      cy.get('#save').click({force: true})
    })

    it('inputan nama kosong', () => {
      cy.visit('http://127.0.0.1:8000')
      cy.get('#email').type ('superadmin@gmail.com')
      cy.get('#password-input').type ('password')
      cy.get(':nth-child(5) > .btn').click()
      cy.visit('http://127.0.0.1:8000/invoice')
      cy.get('')
      cy.get('')
      cy.get('#modal-form-add-menu > .modal-dialog > .modal-content > form > .modal-body > :nth-child(2) > #date')
      cy.get('#modal-form-add-menu > .modal-dialog > .modal-content > form > .modal-body > :nth-child(3) > #nominal')
     cy.get('#modal-form-add-menu > .modal-dialog > .modal-content > form > .modal-body > :nth-child(4) > #nama_rt_id')
      cy.get('#save').click({force: true})
    })

    it('inputan date kosong', () => {
      cy.visit('http://127.0.0.1:8000')
      cy.get('#email').type ('superadmin@gmail.com')
      cy.get('#password-input').type ('password')
      cy.get(':nth-child(5) > .btn').click()
      cy.visit('http://127.0.0.1:8000/invoice')
      cy.get('#modal-form-add-menu > .modal-dialog > .modal-content > form > .modal-body > :nth-child(1) > #name')
      cy.get('')
      cy.get('#modal-form-add-menu > .modal-dialog > .modal-content > form > .modal-body > :nth-child(3) > #nominal')
      cy.get('#modal-form-add-menu > .modal-dialog > .modal-content > form > .modal-body > :nth-child(4) > #nama_rt_id')
      cy.get('#save').click({force: true})
    })

    it('inputan nominal pembayaran kosong', () => {
      cy.visit('http://127.0.0.1:8000')
      cy.get('#email').type ('superadmin@gmail.com')
      cy.get('#password-input').type ('password')
      cy.get(':nth-child(5) > .btn').click()
      cy.visit('http://127.0.0.1:8000/invoice')
      cy.get('#modal-form-add-menu > .modal-dialog > .modal-content > form > .modal-body > :nth-child(1) > #name')
      cy.get('#modal-form-add-menu > .modal-dialog > .modal-content > form > .modal-body > :nth-child(2) > #date')
      cy.get('')
      cy.get('#modal-form-add-menu > .modal-dialog > .modal-content > form > .modal-body > :nth-child(4) > #nama_rt_id')
      cy.get('#save').click({force: true})
    })

    it('inputan nama RT kosong', () => {
      cy.visit('http://127.0.0.1:8000')
      cy.get('#email').type ('superadmin@gmail.com')
      cy.get('#password-input').type ('password')
      cy.get(':nth-child(5) > .btn').click()
      cy.visit('http://127.0.0.1:8000/invoice')
      cy.get('#modal-form-add-menu > .modal-dialog > .modal-content > form > .modal-body > :nth-child(1) > #name')
      cy.get('#modal-form-add-menu > .modal-dialog > .modal-content > form > .modal-body > :nth-child(2) > #date')
      cy.get('#modal-form-add-menu > .modal-dialog > .modal-content > form > .modal-body > :nth-child(3) > #nominal')
      cy.get('')
      cy.get('#save').click({force: true})
    })

    it('inputan kosong semua', () => {
      cy.visit('http://127.0.0.1:8000')
      cy.get('#email').type ('superadmin@gmail.com')
      cy.get('#password-input').type ('password')
      cy.get(':nth-child(5) > .btn').click()
      cy.visit('http://127.0.0.1:8000/invoice')
      cy.get('')
      cy.get('')
      cy.get('')
      cy.get('')
      cy.get('#save').click({force: true})
    })

    it('edit pemasukan', () => {
      cy.visit('http://127.0.0.1:8000')
        cy.get('#email').type ('superadmin@gmail.com')
        cy.get('#password-input').type ('password')
        cy.get(':nth-child(5) > .btn').click()
        cy.visit('http://127.0.0.1:8000/invoice')
        cy.get(':nth-child(1) > :nth-child(6) > .dropdown').click({force:true})
        cy.get(':nth-child(1) > :nth-child(6) > .dropdown > .dropdown-menu > :nth-child(2) > .dropdown-item').click({force:true})
        cy.get('#modal-form-add-menu > .modal-dialog > .modal-content > form > .modal-body > :nth-child(1) > #name')
        cy.get('#modal-form-add-menu > .modal-dialog > .modal-content > form > .modal-body > :nth-child(2) > #date')
        cy.get('#modal-form-add-menu > .modal-dialog > .modal-content > form > .modal-body > :nth-child(3) > #nominal')
        cy.get('#modal-form-add-menu > .modal-dialog > .modal-content > form > .modal-body > :nth-child(4) > #nama_rt_id')
        cy.get('#modal-form-edit-menu-16 > .modal-dialog > .modal-content > form > .modal-footer > #update').click({force:true})

    })

    it('delete pemasukan', () => {
      cy.visit('http://127.0.0.1:8000')
        cy.get('#email').type ('superadmin@gmail.com')
        cy.get('#password-input').type ('password')
        cy.get(':nth-child(5) > .btn').click()
        cy.visit('http://127.0.0.1:8000/invoice')

        cy.get(':nth-child(1) > :nth-child(6) > .dropdown > .dropdown-menu > :nth-child(3) > .dropdown-item').click({force: true})
        //cy.get(':nth-child(3) > .dropdown-item').click({force: true})
    })
  })

