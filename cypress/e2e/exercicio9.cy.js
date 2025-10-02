describe('Exercício 9', () => {
    beforeEach(() => {
    cy.visit('/exercicio9/')
})

it('Deve exibir o título corretamente, botão submit e inputs', () => {
    cy.contains('h1'),('Repetidor de Palavra').should('be.visible')
    cy.get('button[type="submit"]').should('be.visible')
    cy.get('input[name="palavra"]').should('be.visible')
    cy.get('input[name="vezes"]').should('be.visible')
})

it('Deve repetir a palavra três vezes e constar cada palavra o número de vezes solicitado', () => {
    cy.get('input[name="palavra"]').type('TITANS')
    cy.get('input[name="vezes"]').type('3')
    cy.get('button[type="submit"]').click()
    cy.get('.resultado p').should('have.length', 3).should('be.visible')
    cy.contains('.resultado p').eq(0).should('contain.text', '1 - TITANS')
    cy.contains('.resultado p').eq(1).should('contain.text', '2 - TITANS')
    cy.contains('.resultado p').eq(2).should('contain.text', '3 - TITANS')
})

})
