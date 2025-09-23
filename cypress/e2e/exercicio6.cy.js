describe('HOME', () => {
  
  it('Visita a página do exercício', () => {
    cy.visit('/exercicio6')
  })

  it('pagina exercício 6', () => {
    cy.visit('/')
    cy.get('a[href="exercicio6/"]').click()
  })

    it('pagina exercício 6', () => {
    cy.visit('/')
    cy.get('a[href="exercicio6/"]').click()
    cy.contains('Descubra a Nota Musical')
    cy.contains('Número da Nota (de: 1 a 10):')
    cy.get('input[type="number"]')
    cy.get('button[type="submit"]')
    cy.get('body')
  })
})
