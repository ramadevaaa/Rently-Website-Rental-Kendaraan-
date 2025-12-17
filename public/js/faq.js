// FILE: public/js/faq.js

document.addEventListener('DOMContentLoaded', function() {
    
    // FAQ Accordion Functionality
    const faqItems = document.querySelectorAll('.faq-item');
    const faqQuestions = document.querySelectorAll('.faq-question');
    
    faqQuestions.forEach(question => {
        question.addEventListener('click', function() {
            const item = this.closest('.faq-item');
            const isActive = item.classList.contains('active');
            
            // Close all other items
            faqItems.forEach(otherItem => {
                if (otherItem !== item) {
                    otherItem.classList.remove('active');
                }
            });
            
            // Toggle current item
            if (isActive) {
                item.classList.remove('active');
            } else {
                item.classList.add('active');
                
                // Smooth scroll to question if it's below viewport
                setTimeout(() => {
                    const rect = item.getBoundingClientRect();
                    if (rect.top < 0 || rect.bottom > window.innerHeight) {
                        item.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                    }
                }, 300);
            }
        });
    });
    
    // Search Functionality
    const searchInput = document.getElementById('faq-search');
    
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase().trim();
            
            faqItems.forEach(item => {
                const question = item.querySelector('.faq-question span').textContent.toLowerCase();
                const answer = item.querySelector('.faq-answer').textContent.toLowerCase();
                
                if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                    item.classList.remove('hidden');
                    
                    // Highlight matching items
                    if (searchTerm.length > 2) {
                        item.classList.add('highlighted');
                        setTimeout(() => {
                            item.classList.remove('highlighted');
                        }, 1000);
                    }
                } else {
                    item.classList.add('hidden');
                }
            });
            
            // Show message if no results
            const visibleItems = document.querySelectorAll('.faq-item:not(.hidden)');
            const sections = document.querySelectorAll('.faq-section');
            
            sections.forEach(section => {
                const sectionItems = section.querySelectorAll('.faq-item:not(.hidden)');
                if (sectionItems.length === 0 && searchTerm.length > 0) {
                    section.style.display = 'none';
                } else {
                    section.style.display = 'block';
                }
            });
            
            // Show "no results" message
            let noResultsMsg = document.getElementById('no-results-message');
            
            if (visibleItems.length === 0 && searchTerm.length > 0) {
                if (!noResultsMsg) {
                    noResultsMsg = document.createElement('div');
                    noResultsMsg.id = 'no-results-message';
                    noResultsMsg.style.cssText = `
                        text-align: center;
                        padding: 3rem;
                        color: #6B7280;
                        font-size: 1.1rem;
                    `;
                    noResultsMsg.innerHTML = `
                        <div style="font-size: 3rem; margin-bottom: 1rem;">🔍</div>
                        <p style="font-weight: 600; margin-bottom: 0.5rem;">Tidak ada hasil ditemukan</p>
                        <p>Coba gunakan kata kunci lain atau hubungi customer service kami</p>
                    `;
                    document.querySelector('.content-wrapper').appendChild(noResultsMsg);
                }
            } else {
                if (noResultsMsg) {
                    noResultsMsg.remove();
                }
            }
        });
        
        // Clear search on Escape key
        searchInput.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                this.value = '';
                this.dispatchEvent(new Event('input'));
                this.blur();
            }
        });
    }
    
    // Smooth scroll for category links
    const categoryCards = document.querySelectorAll('.category-card');
    
    categoryCards.forEach(card => {
        card.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetSection = document.querySelector(targetId);
            
            if (targetSection) {
                const offset = 100; // Offset for fixed header
                const targetPosition = targetSection.offsetTop - offset;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
                
                // Add pulse animation to target section
                targetSection.style.animation = 'none';
                setTimeout(() => {
                    targetSection.style.animation = 'pulse 0.5s ease';
                }, 10);
            }
        });
    });
    
    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        // Press '/' to focus search
        if (e.key === '/' && !e.ctrlKey && !e.metaKey && !e.altKey) {
            e.preventDefault();
            searchInput.focus();
        }
        
        // Press 'Escape' to close all accordions
        if (e.key === 'Escape') {
            faqItems.forEach(item => {
                item.classList.remove('active');
            });
        }
    });
    
    // Auto-open FAQ from URL hash
    if (window.location.hash) {
        const targetId = window.location.hash.substring(1);
        const targetSection = document.getElementById(targetId);
        
        if (targetSection) {
            setTimeout(() => {
                targetSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                
                // Open first FAQ in the section
                const firstFaq = targetSection.querySelector('.faq-item');
                if (firstFaq) {
                    firstFaq.classList.add('active');
                }
            }, 500);
        }
    }
    
    // Add animation class when element comes into view
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animation = 'fadeInUp 0.6s ease forwards';
            }
        });
    }, observerOptions);
    
    // Observe all FAQ sections
    document.querySelectorAll('.faq-section').forEach(section => {
        observer.observe(section);
    });
    
    // Add keyboard accessibility
    faqQuestions.forEach((question, index) => {
        question.setAttribute('tabindex', '0');
        question.setAttribute('role', 'button');
        question.setAttribute('aria-expanded', 'false');
        
        question.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                this.click();
            }
            
            // Arrow key navigation
            if (e.key === 'ArrowDown') {
                e.preventDefault();
                const nextQuestion = faqQuestions[index + 1];
                if (nextQuestion) nextQuestion.focus();
            }
            
            if (e.key === 'ArrowUp') {
                e.preventDefault();
                const prevQuestion = faqQuestions[index - 1];
                if (prevQuestion) prevQuestion.focus();
            }
        });
    });
    
    // Update aria-expanded on click
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        const observer = new MutationObserver(() => {
            const isActive = item.classList.contains('active');
            question.setAttribute('aria-expanded', isActive);
        });
        
        observer.observe(item, { attributes: true, attributeFilter: ['class'] });
    });
    
    // Print functionality
    const createPrintButton = () => {
        const printBtn = document.createElement('button');
        printBtn.textContent = '🖨️ Cetak FAQ';
        printBtn.style.cssText = `
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            padding: 1rem 1.5rem;
            background: linear-gradient(135deg, #1B3C53, #4487B7);
            color: white;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            transition: all 0.3s ease;
        `;
        
        printBtn.addEventListener('mouseenter', () => {
            printBtn.style.transform = 'translateY(-3px)';
            printBtn.style.boxShadow = '0 15px 30px rgba(0, 0, 0, 0.3)';
        });
        
        printBtn.addEventListener('mouseleave', () => {
            printBtn.style.transform = 'translateY(0)';
            printBtn.style.boxShadow = '0 10px 25px rgba(0, 0, 0, 0.2)';
        });
        
        printBtn.addEventListener('click', () => {
            // Open all accordions before printing
            faqItems.forEach(item => {
                item.classList.add('active');
            });
            
            setTimeout(() => {
                window.print();
            }, 300);
        });
        
        document.body.appendChild(printBtn);
    };
    
    createPrintButton();
    
    console.log('✅ FAQ Page Initialized Successfully!');
});

// Add CSS animation for fade in
const style = document.createElement('style');
style.textContent = `
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.02);
        }
    }
`;
document.head.appendChild(style);