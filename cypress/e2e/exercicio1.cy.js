describe('exercicio 01', () => {

  it('teste do exercício 1', () => {
    cy.visit('exercicio1/')
    cy.contains('h5', 'Exercício 01')
    cy.contains('Digite o primeiro número')
    cy.get('input[name="value1"]').should('exist')
    cy.contains('Digite o segundo número')
    cy.get('input[name="value2"]').should('exist')
    cy.get('input[type="submit"]').should('exist')
  })

  it('Verifica se o valor somado for maior que 20, este deverá ser apresentando somando-se a ele mais 8', () => {
    cy.visit('exercicio1/')
    cy.get('input[name="value1"]').clear().type('11')
    cy.get('input[name="value2"]').clear().type('10')
    cy.get('input[type="submit"]').click()
    cy.contains('0 resultado foi: 29').should('be.visible')
  })

  it('Verifica se o valor somado for menor ou igual a 20, este será apresentado subtraindo-se 5', () => {
    cy.visit('exercicio1/')
    cy.get('input[name="value1"]').clear().type('10')
    cy.get('input[name="value2"]').clear().type('10')
    cy.get('input[type="submit"]').click()
    cy.contains('0 resultado foi: 15').should('be.visible')
  })
  
})