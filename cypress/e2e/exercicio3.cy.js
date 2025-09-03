
describe('Exercício 3', () => {

  it('pagina do exercício 3', () => {
    cy.visit('/')
    cy.get('a[href="exercicio3/"]').click()
  })

  it('Deve exibir o título da página, inputs e botão de verificar', () => {
    cy.visit('/')
    cy.get('a[href="exercicio3/"]').click()
    cy.contains('h4', 'Exercício III').should('be.visible')
    cy.get('input[name="nome"]').should('exist')
    cy.get('input[name="idade"]').should('exist')
    cy.get('input[name="experiencia"]').should('exist')
    cy.get('input[type=submit]').contains('Verificar').should('exist')
  })

  it('Qualificar candidato com idade e experiência adequada', () => {
    cy.visit('/')
    cy.get('a[href="exercicio3/"]').click()
    cy.get('input[type="text"]').type('Edmar Gomes')
    cy.get('input[name="idade"]').type('25')
    cy.get('input[name="experiencia"]').type('3')
    cy.get('input[type="submit"]').click()
    cy.contains('Edmar Gomes - VOCÊ FOI QUALIFICADO PARA A VAGA!').should('be.visible')
  })

    it('Desqualificar candidato com idade inferior a 18 anos', () => {
    cy.visit('/')
    cy.get('a[href="exercicio3/"]').click()
    cy.get('input[type="text"]').type('Liliane')
    cy.get('input[name="idade"]').type('17')
    cy.get('input[name="experiencia"]').type('5')
    cy.get('input[type="submit"]').click()
    cy.contains(' Liliane - VOCÊ NÃO FOI QUALIFICADO PARA A VAGA ').should('be.visible')
  })

  it('Desqualificar candidato com pouca experiência', () => {
    cy.visit('/')
    cy.get('a[href="exercicio3/"]').click()
    cy.get('input[name="nome"]').type('Leticia')
    cy.get('input[name="idade"]').type('30')
    cy.get('input[name="experiencia"]').type('1')
    cy.get('input[type="submit"]').click()
    cy.contains(' Leticia - VOCÊ NÃO FOI QUALIFICADO PARA A VAGA ').should('be.visible')
  })

})