describe('exercicio 2', () => {

  it('Título da página, input e botão de enviar', () => {
    cy.visit('exercicio2/')
    cy.contains('h4', 'Exercício II')
    cy.contains('label', 'Digite qualquer número para saber se ele é divisível por 3, 4 ou 6').should('be.visible')
    cy.get('input[name="number"]').should('exist')
    cy.get('input[type="submit"]').should('exist')
  })

  it('Verifica se o número inserido é divisível por 3, 4, 6 ou por todos eles', () => {
    cy.visit('exercicio2/')
    cy.get('input[name="number"]').clear().type('12')
    cy.get('input[type="submit"]').click()
    cy.contains('O número 12 é divisível por 3.O número 12 é divisível por 4.O número 12 é divisível por 6.').should('be.visible')
  })

  it('Verifica um número inserido que não é divisível por 3, 4, 6 ou por nenhum eles', () => {
    cy.visit('exercicio2/')
    cy.get('input[name="number"]').clear().type('2')
    cy.get('input[type="submit"]').click()
    cy.contains(' O número 2 não é divisível por 3, 4 ou 6. ').should('be.visible')
  })

})