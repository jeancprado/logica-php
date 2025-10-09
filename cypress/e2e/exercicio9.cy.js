describe('Exercício 9', () => {
  beforeEach(() => {
    cy.visit('/exercicio9/')
  })

it('Deve exibir o título corretamente, botão submit e inputs', () => {
    cy.contains('Repetidor de Palavra').should('be.visible')
    cy.get('button[type="submit"]').should('be.visible')
    cy.get('input[name="palavra"]').should('be.visible')
    cy.get('input[name="vezes"]').should('be.visible')
})

it('Deve repetir a palavra 3 vezes e constar cada palavra o número de vezes solicitado', () => {
    cy.get('input[name="palavra"]').type('TITANS')
    cy.get('input[name="vezes"]').type('3')
    cy.get('button[type="submit"]').click()
    cy.get('.resultado p').should('be.visible')
    cy.contains(('1 - TITANS')).should('be.visible')
    cy.contains(('2 - TITANS')).should('be.visible')
    cy.contains(('3 - TITANS')).should('be.visible')
})

})
