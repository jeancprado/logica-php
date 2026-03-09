describe ('Exercício 14 - Classificação de Treinos', () => {
    beforeEach(() => { 
        cy.visit('/exercicio14/');
        });

    it('Exibir o título da página, input e botão submit', () => {
        cy.contains('Sistema de Avaliação de Treinos').should('be.visible');
        cy.contains('Avalie seu desempenho semanal').should('be.visible');
        cy.contains('Carga Média Levantada (kg)').should('be.visible');
        cy.contains('Número de Treinos na Semana').should('be.visible');
        cy.contains('Nota de Dedicação').should('be.visible'); 
        cy.get('input[type="number"]').should('be.visible');
        cy.get('button[type="submit"]').should('be.visible');
        cy.contains('Resultado da Avaliação').should('be.visible');
        cy.contains('Histórico de Avaliações').should('be.visible');
    });
});