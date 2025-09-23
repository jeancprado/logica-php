describe('Exercício 8', () => {

    it('Deve calcular a sequência e a soma para o número 1', () => {
        cy.visit('exercicio8/')
        cy.get('input[name="limite"]').type('1')
        cy.get('button[type="submit"]').click()
        cy.get('.resultado').should('be.visible')
        cy.get('.sequencia').should('contain', '1')
        cy.get('.resultado').should('contain', 'Soma total: 1')
    })

    it('Deve calcular a sequência e a soma para o número 4', () => {
        cy.visit('exercicio8/')
        cy.get('input[name="limite"]').type('4')
        cy.get('button[type="submit"]').click()
        cy.get('.resultado').should('be.visible')
        cy.get('.sequencia').should('contain', '1, 2, 3, 4')
        cy.get('.resultado').should('contain', 'Soma total: 10')
    })

    it('Deve calcular corretamente para outro número (ex: 6)', () => {
        cy.visit('exercicio8/')
        cy.get('input[name="limite"]').type('6')
        cy.get('button[type="submit"]').click()
        cy.get('.resultado').should('be.visible')
        cy.get('.sequencia').should('contain', '1, 2, 3, 4, 5, 6')
        cy.get('.resultado').should('contain', 'Soma total: 21')
    })

})
