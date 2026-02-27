/**
 * Contact form handler — Vanilla JS (no jQuery)
 */
(function () {
  'use strict';

  const form = document.getElementById('mail_form');
  if (!form) return;

  const API_URL = form.getAttribute('action');
  let csrfToken = '';
  let isSubmitting = false;

  // ---------------------------------------------------------------
  // Token
  // ---------------------------------------------------------------

  function fetchToken() {
    const body = new URLSearchParams();
    body.append('token_get', '1');

    fetch(API_URL, { method: 'POST', body: body, credentials: 'same-origin' })
      .then(function (r) { return r.json(); })
      .then(function (data) {
        if (data.status === 'ok') {
          csrfToken = data.token;
        }
      })
      .catch(function () {});

    setTimeout(fetchToken, 900000);
  }

  fetchToken();

  // ---------------------------------------------------------------
  // Validation helpers
  // ---------------------------------------------------------------

  var rules = {
    name_1:       { required: true, label: 'お名前' },
    phone:        { required: true, label: '電話番号', pattern: /^[0-9\-+() ]{7,20}$/, patternMsg: '正しい電話番号を入力してください。' },
    mail_address: { required: true, label: 'メールアドレス', type: 'email' },
    inquiry:      { required: true, label: 'お問い合わせ内容' },
    contents:     { required: true, label: 'お問い合わせ詳細' }
  };

  function validateField(name) {
    var rule = rules[name];
    if (!rule) return '';

    var el = form.elements[name];
    if (!el) return '';

    var value = (el.value || '').trim();

    if (rule.required && value === '') {
      return rule.label + 'を入力してください。';
    }
    if (rule.type === 'email' && value !== '') {
      var emailRe = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRe.test(value)) {
        return '正しいメールアドレスを入力してください。';
      }
    }
    if (rule.pattern && value !== '' && !rule.pattern.test(value)) {
      return rule.patternMsg || '正しく入力してください。';
    }
    return '';
  }

  function validateAll() {
    var firstError = null;
    var hasError = false;

    Object.keys(rules).forEach(function (name) {
      var msg = validateField(name);
      showFieldState(name, msg);
      if (msg && !hasError) {
        hasError = true;
        firstError = form.elements[name];
      }
    });

    if (firstError) {
      firstError.focus();
      var rect = firstError.getBoundingClientRect();
      window.scrollTo({ top: window.scrollY + rect.top - 100, behavior: 'smooth' });
    }

    return !hasError;
  }

  // ---------------------------------------------------------------
  // UI feedback
  // ---------------------------------------------------------------

  function showFieldState(name, errorMsg) {
    var group = form.querySelector('[data-field="' + name + '"]');
    if (!group) return;

    var errEl = group.querySelector('.field-error');
    var input = form.elements[name];

    if (errorMsg) {
      group.classList.add('has-error');
      group.classList.remove('is-valid');
      if (input) input.setAttribute('aria-invalid', 'true');
      if (errEl) errEl.textContent = errorMsg;
    } else {
      group.classList.remove('has-error');
      if (input) input.removeAttribute('aria-invalid');
      if (errEl) errEl.textContent = '';

      var value = input ? (input.value || '').trim() : '';
      if (value !== '') {
        group.classList.add('is-valid');
      } else {
        group.classList.remove('is-valid');
      }
    }
  }

  function updateProgress() {
    var total = Object.keys(rules).length;
    var filled = 0;
    Object.keys(rules).forEach(function (name) {
      var el = form.elements[name];
      if (el && (el.value || '').trim() !== '') filled++;
    });
    var bar = document.getElementById('form-progress-bar');
    if (bar) {
      var pct = Math.round((filled / total) * 100);
      bar.style.width = pct + '%';
    }
    var counter = document.getElementById('form-progress-count');
    if (counter) {
      counter.textContent = filled + ' / ' + total;
    }
  }

  // ---------------------------------------------------------------
  // Floating label support
  // ---------------------------------------------------------------

  function checkFloatLabel(el) {
    var group = el.closest('.form-group');
    if (!group) return;
    if ((el.value || '') !== '' || document.activeElement === el) {
      group.classList.add('is-focused');
    } else {
      group.classList.remove('is-focused');
    }
  }

  // ---------------------------------------------------------------
  // Events — real-time validation
  // ---------------------------------------------------------------

  Object.keys(rules).forEach(function (name) {
    var el = form.elements[name];
    if (!el) return;

    el.addEventListener('blur', function () {
      var msg = validateField(name);
      showFieldState(name, msg);
      checkFloatLabel(el);
      updateProgress();
    });

    el.addEventListener('focus', function () {
      checkFloatLabel(el);
    });

    el.addEventListener('input', function () {
      var group = form.querySelector('[data-field="' + name + '"]');
      if (group && group.classList.contains('has-error')) {
        var msg = validateField(name);
        showFieldState(name, msg);
      }
      updateProgress();
      checkFloatLabel(el);
    });
  });

  // Init floating labels on page load
  document.addEventListener('DOMContentLoaded', function () {
    Object.keys(rules).forEach(function (name) {
      var el = form.elements[name];
      if (el) checkFloatLabel(el);
    });
    updateProgress();
  });

  // ---------------------------------------------------------------
  // Submit
  // ---------------------------------------------------------------

  var submitBtn = document.getElementById('glass_submit_button');

  function handleSubmit(e) {
    if (e) e.preventDefault();
    if (isSubmitting) return;

    if (!validateAll()) return;

    isSubmitting = true;
    if (submitBtn) {
      submitBtn.classList.add('is-sending');
      var btnText = submitBtn.querySelector('.btn-text');
      if (btnText) btnText.textContent = '送信中...';
    }

    var fd = new FormData(form);
    fd.append('_token', csrfToken);

    fetch(API_URL, {
      method: 'POST',
      body: fd,
      credentials: 'same-origin'
    })
    .then(function (r) { return r.json(); })
    .then(function (data) {
      if (data.status === 'success') {
        window.location.href = data.thanks_url;
        return;
      }

      if (data.status === 'validation_error' && data.errors) {
        alert(data.errors.join('\n'));
      } else {
        alert(data.message || '送信に失敗しました。');
      }

      resetButton();
    })
    .catch(function () {
      alert('通信に失敗しました。ページを再読み込みしてからもう一度お試しください。');
      resetButton();
    });
  }

  function resetButton() {
    isSubmitting = false;
    if (submitBtn) {
      submitBtn.classList.remove('is-sending');
      var btnText = submitBtn.querySelector('.btn-text');
      if (btnText) btnText.textContent = '送信する';
    }
    fetchToken();
  }

  if (submitBtn) {
    submitBtn.addEventListener('click', handleSubmit);
  }

  form.addEventListener('submit', handleSubmit);

  // Prevent enter key from submitting
  form.addEventListener('keydown', function (e) {
    if (e.key === 'Enter' && e.target.tagName !== 'TEXTAREA') {
      e.preventDefault();
    }
  });

})();
