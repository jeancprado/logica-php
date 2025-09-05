describe('Exercício 5', () => {

   it('Deve exibir o título da página, inputs e botão de enviar', () => {
    cy.visit('/')
    cy.get('a[href="exercicio5/"]').click()
    cy.contains('h3', 'Qual é o formato do parelelepídedo?').should('be.visible')
    cy.contains('insira as medidas abaixo para verificar').should('be.visible')
    cy.get('input[name="comprimento"]').should('exist')
    cy.get('input[name="largura"]').should('exist')
    cy.get('input[name="altura"]').should('exist')
    cy.get('button[type="submit"]').contains('Enviar').should('exist')
  })

  it('Deve identificar como Cubo quando todos os lados são iguais', () => {
    cy.visit('/')
    cy.get('a[href="exercicio5/"]').click()
    cy.get('input[name="comprimento"]').type('5')
    cy.get('input[name="largura"]').type('5')
    cy.get('input[name="altura"]').type('5')
    cy.get('button[type="submit"]').click()
    cy.contains('Cubo').should('be.visible')
  })

  it('Deve identificar como Paralelepípedo Retangular quando apenas dois lados são iguais', () => {
    cy.visit('/')
    cy.get('a[href="exercicio5/"]').click()
    cy.get('input[name="comprimento"]').type('5')
    cy.get('input[name="largura"]').type('5')
    cy.get('input[name="altura"]').type('8')
    cy.get('button[type="submit"]').click()
    cy.contains('Paralelepípedo Retangular').should('be.visible')
  })

  it('Deve identificar como Paralelepípedo Oblíquo quando todos os lados são diferentes', () => {
    cy.visit('/')
    cy.get('a[href="exercicio5/"]').click()
    cy.get('input[name="comprimento"]').type('3')
    cy.get('input[name="largura"]').type('4')
    cy.get('input[name="altura"]').type('5')
    cy.get('button[type="submit"]').click()
    cy.contains('Paralelepípedo Oblíquo').should('be.visible')
  })

})