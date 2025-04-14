import { ref, mergeProps, useSSRContext, resolveComponent, unref, reactive, createSSRApp, h } from "vue";
import { ssrRenderAttrs, ssrRenderAttr, ssrRenderList, ssrInterpolate, ssrRenderComponent, ssrGetDynamicModelProps, ssrIncludeBooleanAttr, ssrLooseContain, ssrLooseEqual } from "vue/server-renderer";
import { Link, usePage, createInertiaApp } from "@inertiajs/vue3";
import { useI18n } from "vue-i18n";
import createServer from "@inertiajs/vue3/server";
import { renderToString } from "@vue/server-renderer";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { library } from "@fortawesome/fontawesome-svg-core";
import { fas } from "@fortawesome/free-solid-svg-icons";
const _sfc_main$Y = {
  __name: "navbarSearch",
  __ssrInlineRender: true,
  setup(__props) {
    const query = ref("");
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "hidden md:block relative w-64" }, _attrs))}><input type="text"${ssrRenderAttr("value", query.value)} placeholder="O que procuras?" class="mt-3 w-64 px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"></div>`);
    };
  }
};
const _sfc_setup$Y = _sfc_main$Y.setup;
_sfc_main$Y.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Inputs/Navbar/navbarSearch.vue");
  return _sfc_setup$Y ? _sfc_setup$Y(props, ctx) : void 0;
};
const _export_sfc = (sfc, props) => {
  const target = sfc.__vccOpts || sfc;
  for (const [key, val] of props) {
    target[key] = val;
  }
  return target;
};
const _sfc_main$X = {
  data() {
    return {
      dropdownNavbarStates: {}
    };
  },
  props: {
    Utilizador: {
      type: Object
    },
    Buttons: {
      type: Array
    }
  },
  computed: {
    filterButtonsNavBar() {
      const navbarButtons2 = [1, 2, 3, 4, 5, 6];
      return this.Buttons.filter((btn) => navbarButtons2.includes(btn.id));
    }
  },
  methods: {
    toggleDropdownNavbar(btnId) {
      if (this.dropdownNavbarStates[btnId]) {
        this.dropdownNavbarStates[btnId] = false;
      } else {
        this.dropdownNavbarStates[btnId] = true;
      }
    },
    isDropdownNavbarOpen(btnId) {
      return this.dropdownNavbarStates[btnId] === true;
    },
    redirect(route) {
      this.$inertia.visit(route);
    }
  }
};
function _sfc_ssrRender$G(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "hidden md:flex md:items-center md:space-x-6 ml-8" }, _attrs))}><!--[-->`);
  ssrRenderList($options.filterButtonsNavBar, (btn) => {
    _push(`<div><button class="text-gray-500 hover:text-blue-600 transition duration-300">${ssrInterpolate(btn.button_name)}</button>`);
    if (btn.dropdown && $options.isDropdownNavbarOpen(btn.id)) {
      _push(`<ul class="absolute p-5 z-10 mt-2 w-52 rounded-lg border border-slate-200 bg-white shadow-lg text-center text-md"><!--[-->`);
      ssrRenderList(JSON.parse(btn.dropdownOptions), (option) => {
        _push(`<li class="cursor-pointer text-slate-800 hover:text-blue-600">${ssrInterpolate(option.button_name)}</li>`);
      });
      _push(`<!--]--></ul>`);
    } else {
      _push(`<!---->`);
    }
    _push(`</div>`);
  });
  _push(`<!--]--></div>`);
}
const _sfc_setup$X = _sfc_main$X.setup;
_sfc_main$X.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Buttons/Navbar/navbarButtons.vue");
  return _sfc_setup$X ? _sfc_setup$X(props, ctx) : void 0;
};
const navbarButtons = /* @__PURE__ */ _export_sfc(_sfc_main$X, [["ssrRender", _sfc_ssrRender$G]]);
const _sfc_main$W = {
  data() {
    return {
      isDropdownOpen: false
    };
  },
  computed: {
    filterButtonsDropDownMenuNotLogged() {
      const DropdownButtons = ["Iniciar Sessão", "Criar Conta"];
      return this.Buttons.filter(
        (btn) => DropdownButtons.includes(btn.button_name)
      );
    },
    filterButtonsDropDownMenuLogged() {
      const DropdownButtons = [
        "Definições da Conta",
        "Ver Pedidos",
        "Terminar Sessão"
      ];
      return this.Buttons.filter(
        (btn) => DropdownButtons.includes(btn.button_name)
      );
    },
    filterButtonsDropDownMenuAdmin() {
      const DropdownButtons = [
        "Painel Administrativo",
        "Terminar Sessão"
      ];
      return this.Buttons.filter(
        (btn) => DropdownButtons.includes(btn.button_name)
      );
    }
  },
  methods: {
    toggleDropdown() {
      this.isDropdownOpen = !this.isDropdownOpen;
    },
    redirect(route) {
      this.$inertia.visit(route);
    }
  },
  props: {
    Utilizador: {
      type: Object
    },
    Buttons: {
      type: Array
    },
    isAdmin: {
      type: Boolean
    }
  }
};
function _sfc_ssrRender$F(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_fa = resolveComponent("fa");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "relative" }, _attrs))}><button class="p-2 text-neutral-400 hover:text-blue-600 transition duration-300"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg></button>`);
  if ($data.isDropdownOpen) {
    _push(`<ul class="absolute right-0 z-10 mt-3 w-60 pb-3 rounded-lg border border-slate-200 bg-white shadow-lg text-center">`);
    if (!$props.Utilizador) {
      _push(`<li class="cursor-pointer text-slate-800 hover:text-blue-600"><a><li class="cursor-pointer text-slate-800 px-2 pt-2 font-bold"><span class="text-center">Olá, Visitante</span><hr class="my-2 border-slate-200"></li></a><!--[-->`);
      ssrRenderList($options.filterButtonsDropDownMenuNotLogged, (btn) => {
        _push(`<button class="text-slate-800 hover:text-blue-600 transition duration-300 ml-2"><span class="flex items-center gap-2">`);
        if (btn.icon) {
          _push(ssrRenderComponent(_component_fa, {
            icon: btn.icon,
            class: "text-lg"
          }, null, _parent));
        } else {
          _push(`<!---->`);
        }
        _push(`<span>${ssrInterpolate(btn.button_name)}</span></span></button>`);
      });
      _push(`<!--]--></li>`);
    } else {
      _push(`<!---->`);
    }
    if ($props.Utilizador && !$props.isAdmin) {
      _push(`<li class="cursor-pointer text-slate-800 p-3 hover:text-blue-600"><a><li class="cursor-pointer text-slate-800 px-2 pt-2 font-bold"><span class="text-center">Olá, ${ssrInterpolate($props.Utilizador.name)}</span><hr class="my-2 border-slate-200"></li></a><!--[-->`);
      ssrRenderList($options.filterButtonsDropDownMenuLogged, (btn) => {
        _push(`<button class="text-slate-800 hover:text-blue-600 transition duration-300 ml-2"><span class="flex items-center gap-2">`);
        if (btn.icon) {
          _push(ssrRenderComponent(_component_fa, {
            icon: btn.icon,
            class: "text-lg"
          }, null, _parent));
        } else {
          _push(`<!---->`);
        }
        _push(`<span>${ssrInterpolate(btn.button_name)}</span></span></button>`);
      });
      _push(`<!--]--></li>`);
    } else {
      _push(`<!---->`);
    }
    if ($props.isAdmin) {
      _push(`<li><a><li class="cursor-pointer text-slate-800 px-2 pt-2 font-bold"><span class="text-center">Olá, ${ssrInterpolate($props.Utilizador.name)}</span><hr class="my-2 border-slate-200"></li></a><!--[-->`);
      ssrRenderList($options.filterButtonsDropDownMenuAdmin, (btn) => {
        _push(`<button class="text-slate-800 hover:text-blue-600 transition duration-300 ml-2"><span class="flex items-center gap-2">`);
        if (btn.icon) {
          _push(ssrRenderComponent(_component_fa, {
            icon: btn.icon,
            class: "text-lg"
          }, null, _parent));
        } else {
          _push(`<!---->`);
        }
        _push(`<span>${ssrInterpolate(btn.button_name)}</span></span></button>`);
      });
      _push(`<!--]--></li>`);
    } else {
      _push(`<!---->`);
    }
    _push(`</ul>`);
  } else {
    _push(`<!---->`);
  }
  _push(`</div>`);
}
const _sfc_setup$W = _sfc_main$W.setup;
_sfc_main$W.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Buttons/Navbar/userButton.vue");
  return _sfc_setup$W ? _sfc_setup$W(props, ctx) : void 0;
};
const userButton = /* @__PURE__ */ _export_sfc(_sfc_main$W, [["ssrRender", _sfc_ssrRender$F]]);
const __default__$3 = {};
const _sfc_main$V = /* @__PURE__ */ Object.assign(__default__$3, {
  __name: "navbarSearchMobile",
  __ssrInlineRender: true,
  setup(__props) {
    const query = ref("");
    return (_ctx, _push, _parent, _attrs) => {
      let _temp0;
      _push(`<input${ssrRenderAttrs((_temp0 = mergeProps({
        type: "text",
        value: query.value,
        placeholder: "O que procuras?",
        class: "w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
      }, _attrs), mergeProps(_temp0, ssrGetDynamicModelProps(_temp0, query.value))))}>`);
    };
  }
});
const _sfc_setup$V = _sfc_main$V.setup;
_sfc_main$V.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Inputs/Navbar/navbarSearchMobile.vue");
  return _sfc_setup$V ? _sfc_setup$V(props, ctx) : void 0;
};
const _sfc_main$U = {
  components: {
    NavbarSearchMobile: _sfc_main$V
  },
  props: {
    Buttons: {
      type: Array,
      required: true
    }
  },
  data() {
    return {
      isMobileMenuOpen: false
    };
  },
  methods: {
    redirect(route) {
      this.$inertia.visit(route);
    },
    toggleMobileMenu() {
      this.isMobileMenuOpen = !this.isMobileMenuOpen;
    }
  },
  computed: {
    filterButtonsNavBar() {
      const navbarButtons2 = [1, 2, 3, 4, 5, 6];
      return this.Buttons.filter((btn) => navbarButtons2.includes(btn.id));
    }
  }
};
function _sfc_ssrRender$E(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_NavbarSearchMobile = resolveComponent("NavbarSearchMobile");
  _push(`<!--[--><div><div class="md:hidden flex items-center"><button class="p-2 text-neutral-400 hover:text-blue-600 transition duration-300"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg></button></div></div>`);
  if ($data.isMobileMenuOpen) {
    _push(`<div class="md:hidden absolute top-16 right-0 w-full z-10 bg-white"><div class="px-2 pt-2 pb-3 space-y-2">`);
    _push(ssrRenderComponent(_component_NavbarSearchMobile, null, null, _parent));
    _push(`<!--[-->`);
    ssrRenderList($options.filterButtonsNavBar, (btn) => {
      _push(`<a class="block px-3 py-2 text-gray-700 hover:bg-gray-100 rounded text-center">${ssrInterpolate(btn.button_name)}</a>`);
    });
    _push(`<!--]--></div></div>`);
  } else {
    _push(`<!---->`);
  }
  _push(`<!--]-->`);
}
const _sfc_setup$U = _sfc_main$U.setup;
_sfc_main$U.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Menu/Mobile/navbarMenuMobile.vue");
  return _sfc_setup$U ? _sfc_setup$U(props, ctx) : void 0;
};
const NavbarMenuMobile = /* @__PURE__ */ _export_sfc(_sfc_main$U, [["ssrRender", _sfc_ssrRender$E]]);
const _sfc_main$T = {
  components: {
    NavbarSearch: _sfc_main$Y,
    NavbarSearchMobile: _sfc_main$V,
    navbarButtons,
    userButton,
    NavbarMenuMobile
  },
  data() {
    return {
      isMobileMenuOpen: false
    };
  },
  props: {
    Utilizador: {
      type: Object
    },
    Buttons: {
      type: Array
    },
    isAdmin: {
      type: Boolean
    }
  },
  methods: {
    toggleMobileMenu() {
      this.isMobileMenuOpen = !this.isMobileMenuOpen;
    }
  },
  computed: {
    filterButtonsNavBar() {
      const navbarButtons2 = [1, 2, 3, 4, 5, 6];
      return this.Buttons.filter((btn) => navbarButtons2.includes(btn.id));
    }
  }
};
function _sfc_ssrRender$D(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_navbarButtons = resolveComponent("navbarButtons");
  const _component_NavbarSearch = resolveComponent("NavbarSearch");
  const _component_userButton = resolveComponent("userButton");
  const _component_NavbarMenuMobile = resolveComponent("NavbarMenuMobile");
  _push(`<nav${ssrRenderAttrs(mergeProps({ class: "bg-white shadow-lg" }, _attrs))}><div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"><div class="flex justify-between h-16"><div class="flex items-center"><a href="http://localhost:8000/" class="flex items-center"><span class="font-semibold text-blue-600 text-2xl">MaRca</span></a>`);
  _push(ssrRenderComponent(_component_navbarButtons, {
    Utilizador: $props.Utilizador,
    Buttons: $props.Buttons
  }, null, _parent));
  _push(`</div>`);
  _push(ssrRenderComponent(_component_NavbarSearch, null, null, _parent));
  _push(`<div class="flex items-center space-x-6"><div class="flex items-center space-x-4">`);
  _push(ssrRenderComponent(_component_userButton, {
    Utilizador: $props.Utilizador,
    Buttons: $props.Buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<a href="#" class="p-2 text-neutral-400 hover:text-blue-600 transition duration-300 relative"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg></a>`);
  _push(ssrRenderComponent(_component_NavbarMenuMobile, { Buttons: $props.Buttons }, null, _parent));
  _push(`</div></div></div></div></nav>`);
}
const _sfc_setup$T = _sfc_main$T.setup;
_sfc_main$T.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/navbar.vue");
  return _sfc_setup$T ? _sfc_setup$T(props, ctx) : void 0;
};
const Navbar = /* @__PURE__ */ _export_sfc(_sfc_main$T, [["ssrRender", _sfc_ssrRender$D]]);
const _sfc_main$S = {
  props: {
    products: {
      type: Array,
      required: true
    },
    category: {
      type: Array,
      required: true
    },
    subcategory: {
      type: Array,
      required: true
    },
    manufacturer: {
      type: Array,
      required: true
    }
  },
  methods: {
    Desconto(promo) {
      const Discount = promo.price * (promo.sale_price / 100);
      const FinalDiscount = promo.price - Discount;
      return FinalDiscount.toFixed(2);
    },
    showCategories(category_id) {
      const category = this.category.find(
        (cate) => cate.id === category_id
      );
      return category.name;
    },
    showSubcategories(subcategory_id) {
      const subcategory = this.subcategory.find(
        (subcate) => subcate.id === subcategory_id
      );
      return subcategory.name;
    }
  }
};
function _sfc_ssrRender$C(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_fa = resolveComponent("fa");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "mt-8 flex justify-center items-center ml-5" }, _attrs))}><div class="w-full max-w-6xl max-h-6xl mx-auto"><ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6"><!--[-->`);
  ssrRenderList($props.products, (promo) => {
    _push(`<li class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col p-6"><div class="mb-4"><a${ssrRenderAttr("href", `/${promo.category.slug}/${promo.subcategory.slug}/${promo.slug}`)}><div>`);
    if (promo.reconditioned == true) {
      _push(`<div class="z-10 text-sm font-bold text-purple-500 m-0"><h1>Recondicionado</h1></div>`);
    } else {
      _push(`<!---->`);
    }
    _push(`<img${ssrRenderAttr("src", `/storage/${promo.image_path}`)}${ssrRenderAttr("alt", promo.name)} class="w-full h-56 object-contain rounded-lg transition delay-50 hover:scale-105"></div></a>`);
    if (promo.sale_price > 0) {
      _push(`<div class="text-right text-sm font-semibold text-red-500 lg:text-lg"> -${ssrInterpolate(promo.sale_price)}% </div>`);
    } else {
      _push(`<div class="invisible">${ssrInterpolate(promo.sale_price)}</div>`);
    }
    _push(`</div><div class="flex-grow"><h2 class="text-[0.70rem] mb-2 text-gray-400">${ssrInterpolate($options.showCategories(promo.category_id))} <a${ssrRenderAttr("href", `/${promo.category.slug}/${promo.subcategory.slug}`)} class="cursor-pointer hover:text-gray-500">${ssrInterpolate($options.showSubcategories(promo.subcategory_id))}</a></h2></div><div class="flex-grow"><a${ssrRenderAttr("href", `/${promo.category.slug}/${promo.subcategory.slug}/${promo.slug}`)}><h2 class="line-clamp-2 text-sm font-semibold mb-2 hover:text-blue-600">${ssrInterpolate(promo.name)}</h2></a></div><div class="flex-grow"><h2 class="line-clamp-2 text-xs max-w-100 text-neutral-500">${ssrInterpolate(promo.description)}</h2></div><div class="mt-4 flex gap-5 items-center">`);
    if (promo.sale_price <= 0) {
      _push(`<span class="text-2xl mb-1 font-bold text-blue-600">${ssrInterpolate(promo.price)}€ </span>`);
    } else {
      _push(`<span class="text-2xl mb-1 font-bold text-red-600">${ssrInterpolate($options.Desconto(promo))}€ <span class="text-sm mb-1 text-neutral-400 line-through">${ssrInterpolate(promo.price)}€ </span></span>`);
    }
    _push(`</div><div class="flex gap-4 items-center">`);
    if (promo.stock <= 0) {
      _push(`<span class="text-md mb-1 font-bold text-red-600"><p>`);
      _push(ssrRenderComponent(_component_fa, {
        icon: "fa-solid fa-xmark",
        class: "text-red-600 mr-1"
      }, null, _parent));
      _push(` Sem Stock </p></span>`);
    } else if (promo.stock <= 10) {
      _push(`<span class="text-md mb-1 font-bold text-yellow-600"><p>`);
      _push(ssrRenderComponent(_component_fa, {
        icon: "fa-solid fa-check",
        class: "text-yellow-600 mr-1"
      }, null, _parent));
      _push(` Poucas unidades </p></span>`);
    } else {
      _push(`<span class="text-md mb-1 font-bold text-emerald-400"><p>`);
      _push(ssrRenderComponent(_component_fa, {
        icon: "fa-solid fa-check",
        class: "text-emerald-400 mr-1"
      }, null, _parent));
      _push(` Em Stock </p></span>`);
    }
    _push(`</div><div class="flex items-center gap-2"><button class="bg-neutral-800 text-white px-4 py-2 hover:bg-blue-600 transition-colors duration-300 w-5/6"> Adicionar </button><button class="bg-neutral-400 text-white px-4 py-2 hover:bg-blue-700 transition-colors duration-300"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6" fill="white"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"></path></svg></button></div></li>`);
  });
  _push(`<!--]--></ul></div></div>`);
}
const _sfc_setup$S = _sfc_main$S.setup;
_sfc_main$S.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Categories/productComponent.vue");
  return _sfc_setup$S ? _sfc_setup$S(props, ctx) : void 0;
};
const Product$1 = /* @__PURE__ */ _export_sfc(_sfc_main$S, [["ssrRender", _sfc_ssrRender$C]]);
const _sfc_main$R = {
  components: {
    Link
  },
  props: {
    links: {
      type: Array,
      default: () => []
    }
  }
};
function _sfc_ssrRender$B(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_Link = resolveComponent("Link");
  if ($props.links.length > 0) {
    _push(`<div${ssrRenderAttrs(mergeProps({ class: "flex justify-center mt-4 gap-2 mb-4" }, _attrs))}><!--[-->`);
    ssrRenderList($props.links, (link, index) => {
      _push(`<!--[-->`);
      if (link.url) {
        _push(ssrRenderComponent(_component_Link, {
          href: link.url,
          class: ["px-4 py-2 text-sm text-black font-medium bg-white border border-gray-300 rounded-sm", {
            "bg-blue-700 text-white hover:bg-blue-500 ": link.active
          }]
        }, null, _parent));
      } else {
        _push(`<!---->`);
      }
      _push(`<!--]-->`);
    });
    _push(`<!--]--></div>`);
  } else {
    _push(`<!---->`);
  }
}
const _sfc_setup$R = _sfc_main$R.setup;
_sfc_main$R.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Inputs/Pagination/paginate.vue");
  return _sfc_setup$R ? _sfc_setup$R(props, ctx) : void 0;
};
const Pagination = /* @__PURE__ */ _export_sfc(_sfc_main$R, [["ssrRender", _sfc_ssrRender$B]]);
const _sfc_main$Q = {
  components: {
    Navbar,
    Product: Product$1,
    Pagination
  },
  props: {
    products: {
      type: Array,
      required: true
    },
    category: {
      type: Array,
      required: true
    },
    subcategory: {
      type: Array,
      required: true
    },
    Utilizador: {
      type: Object
    },
    buttons: {
      type: Array,
      required: true
    },
    isAdmin: {
      type: Boolean
    }
  }
};
function _sfc_ssrRender$A(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_Navbar = resolveComponent("Navbar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_Navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"> Acessórios para Computador </h1>`);
  _push(ssrRenderComponent(_component_Product, {
    products: $props.products.data,
    category: $props.category,
    subcategory: $props.subcategory
  }, null, _parent));
  _push(ssrRenderComponent(_component_Pagination, {
    links: $props.products.links
  }, null, _parent));
  _push(`</div>`);
}
const _sfc_setup$Q = _sfc_main$Q.setup;
_sfc_main$Q.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Acessorios/AcessoriosPcPage.vue");
  return _sfc_setup$Q ? _sfc_setup$Q(props, ctx) : void 0;
};
const AcessoriosPcPage = /* @__PURE__ */ _export_sfc(_sfc_main$Q, [["ssrRender", _sfc_ssrRender$A]]);
const __vite_glob_0_0 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: AcessoriosPcPage
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$P = {
  components: {
    Navbar,
    Product: Product$1,
    Pagination
  },
  props: {
    products: {
      type: Array,
      required: true
    },
    category: {
      type: Array,
      required: true
    },
    subcategory: {
      type: Array,
      required: true
    },
    Utilizador: {
      type: Object
    },
    buttons: {
      type: Array,
      required: true
    },
    isAdmin: {
      type: Boolean
    }
  }
};
function _sfc_ssrRender$z(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_Navbar = resolveComponent("Navbar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_Navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"> Acessórios para Telemóveis </h1>`);
  _push(ssrRenderComponent(_component_Product, {
    products: $props.products.data,
    category: $props.category,
    subcategory: $props.subcategory
  }, null, _parent));
  _push(ssrRenderComponent(_component_Pagination, {
    links: $props.products.links
  }, null, _parent));
  _push(`</div>`);
}
const _sfc_setup$P = _sfc_main$P.setup;
_sfc_main$P.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Acessorios/AcessoriosSmartPhonePage.vue");
  return _sfc_setup$P ? _sfc_setup$P(props, ctx) : void 0;
};
const AcessoriosSmartPhonePage = /* @__PURE__ */ _export_sfc(_sfc_main$P, [["ssrRender", _sfc_ssrRender$z]]);
const __vite_glob_0_1 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: AcessoriosSmartPhonePage
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$O = {
  components: {
    Navbar,
    Product: Product$1,
    Pagination
  },
  props: {
    products: {
      type: Array,
      required: true
    },
    category: {
      type: Array,
      required: true
    },
    subcategory: {
      type: Array,
      required: true
    },
    Utilizador: {
      type: Object
    },
    buttons: {
      type: Array,
      required: true
    },
    isAdmin: {
      type: Boolean
    }
  }
};
function _sfc_ssrRender$y(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_Navbar = resolveComponent("Navbar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_Navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"> Acessórios para Casa </h1>`);
  _push(ssrRenderComponent(_component_Product, {
    products: $props.products.data,
    category: $props.category,
    subcategory: $props.subcategory
  }, null, _parent));
  _push(ssrRenderComponent(_component_Pagination, {
    links: $props.products.links
  }, null, _parent));
  _push(`</div>`);
}
const _sfc_setup$O = _sfc_main$O.setup;
_sfc_main$O.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Acessorios/AcessorioscasaPage.vue");
  return _sfc_setup$O ? _sfc_setup$O(props, ctx) : void 0;
};
const AcessorioscasaPage = /* @__PURE__ */ _export_sfc(_sfc_main$O, [["ssrRender", _sfc_ssrRender$y]]);
const __vite_glob_0_2 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: AcessorioscasaPage
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$N = {
  __name: "MemoryRamFilter",
  __ssrInlineRender: true,
  props: {
    capacityRam: Array,
    typeRam: Array,
    frequencyRam: Array,
    latencyRam: Array,
    ram: Array
  },
  emits: [
    "update:capacityRam",
    "update:typeRam",
    "update:frequencyRam",
    "update:latencyRam"
  ],
  setup(__props, { emit: __emit }) {
    const { t } = useI18n();
    const props = __props;
    const uniqueSizesRam = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.ram.filter((ram) => {
        if (!sizeRAM.has(ram.size)) {
          sizeRAM.add(ram.size);
          return true;
        }
        return false;
      });
    };
    const uniqueTypeRam = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.ram.filter((ram) => {
        if (!sizeRAM.has(ram.type)) {
          sizeRAM.add(ram.type);
          return true;
        }
        return false;
      });
    };
    const uniqueFrequencyRam = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.ram.filter((ram) => {
        if (!sizeRAM.has(ram.frequency)) {
          sizeRAM.add(ram.frequency);
          return true;
        }
        return false;
      });
    };
    const uniqueLatencyRam = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.ram.filter((ram) => {
        if (!sizeRAM.has(ram.latency)) {
          sizeRAM.add(ram.latency);
          return true;
        }
        return false;
      });
    };
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[--><div class="mt-4"><label class="block text-md font-semibold mb-1">${ssrInterpolate(unref(t)("ram-capacity"))}</label><!--[-->`);
      ssrRenderList(uniqueSizesRam(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.size)} class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(option.size >= 1e3 ? option.size / 1e3 + " TB" : option.size + " GB")}</span></label></div>`);
      });
      _push(`<!--]--></div><div class="mt-4"><label class="block text-md font-semibold mb-1">${ssrInterpolate(unref(t)("ram-type"))}</label><!--[-->`);
      ssrRenderList(uniqueTypeRam(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.type)} class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(option.type)}</span></label></div>`);
      });
      _push(`<!--]--></div><div class="mt-4"><label class="block text-md font-semibold mb-1">${ssrInterpolate(unref(t)("ram-speed"))}</label><!--[-->`);
      ssrRenderList(uniqueFrequencyRam(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.frequency)} class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(option.frequency)} Mhz</span></label></div>`);
      });
      _push(`<!--]--></div><div class="mt-4"><label class="block text-md font-semibold mb-1">${ssrInterpolate(unref(t)("ram-latency"))}</label><!--[-->`);
      ssrRenderList(uniqueLatencyRam(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.latency)} class="form-checkbox size-4"><span class="ml-2">CL${ssrInterpolate(option.latency)}</span></label></div>`);
      });
      _push(`<!--]--></div><!--]-->`);
    };
  }
};
const _sfc_setup$N = _sfc_main$N.setup;
_sfc_main$N.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Filters/MemoryRamFilter.vue");
  return _sfc_setup$N ? _sfc_setup$N(props, ctx) : void 0;
};
const _sfc_main$M = {
  __name: "ProcessorFilter",
  __ssrInlineRender: true,
  props: {
    modelCPU: Array,
    socketCPU: Array,
    tdpCPU: Array,
    cpu: Array
  },
  emits: [
    "update:modelCPU",
    "update:socketCPU",
    "update:tdpCPU"
  ],
  setup(__props, { emit: __emit }) {
    const { t } = useI18n();
    const props = __props;
    const uniqueCPU = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.cpu.filter((ram) => {
        if (!sizeRAM.has(ram.model)) {
          sizeRAM.add(ram.model);
          return true;
        }
        return false;
      });
    };
    const uniqueSocket = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.cpu.filter((ram) => {
        if (!sizeRAM.has(ram.socket)) {
          sizeRAM.add(ram.socket);
          return true;
        }
        return false;
      });
    };
    const uniqueTDP = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.cpu.filter((ram) => {
        if (!sizeRAM.has(ram.tdp)) {
          sizeRAM.add(ram.tdp);
          return true;
        }
        return false;
      });
    };
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[--><div class="mt-4"><label class="block text-md font-semibold mb-1">${ssrInterpolate(unref(t)("processor-family"))}</label><!--[-->`);
      ssrRenderList(uniqueCPU(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.model)} class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(option.model)}</span></label></div>`);
      });
      _push(`<!--]--></div><div class="mt-4"><label class="block text-md font-semibold mb-1">${ssrInterpolate(unref(t)("processor-socket"))}</label><!--[-->`);
      ssrRenderList(uniqueSocket(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.socket)} class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(option.socket)}</span></label></div>`);
      });
      _push(`<!--]--></div><div class="mt-4"><label class="block text-md font-semibold mb-1">${ssrInterpolate(unref(t)("processor-tdp"))}</label><!--[-->`);
      ssrRenderList(uniqueTDP(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.tdp)} class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(option.tdp)} W</span></label></div>`);
      });
      _push(`<!--]--></div><!--]-->`);
    };
  }
};
const _sfc_setup$M = _sfc_main$M.setup;
_sfc_main$M.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Filters/ProcessorFilter.vue");
  return _sfc_setup$M ? _sfc_setup$M(props, ctx) : void 0;
};
const _sfc_main$L = {
  __name: "StorageFilter",
  __ssrInlineRender: true,
  props: {
    capacityDrive: Array,
    typeDrive: Array,
    writingSpeedDrive: Array,
    rotationSpeedDrive: Array,
    armazenamento: Array
  },
  emits: [
    "update:capacityDrive",
    "update:typeDrive",
    "update:writingSpeedDrive",
    "update:rotationSpeedDrive"
  ],
  setup(__props, { emit: __emit }) {
    const { t } = useI18n();
    const props = __props;
    const uniqueSizesDrive = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.armazenamento.filter((ram) => {
        if (!sizeRAM.has(ram.size)) {
          sizeRAM.add(ram.size);
          return true;
        }
        return false;
      });
    };
    const uniqueTypeDrive = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.armazenamento.filter((ram) => {
        if (!sizeRAM.has(ram.type)) {
          sizeRAM.add(ram.type);
          return true;
        }
        return false;
      });
    };
    const uniqueWritingSpeedDrive = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.armazenamento.filter((ram) => {
        if (ram.writing_speed && ram.type !== "HDD" && !sizeRAM.has(ram.writing_speed)) {
          sizeRAM.add(ram.writing_speed);
          return true;
        }
        return false;
      });
    };
    const uniqueRotationArmazenamento = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.armazenamento.filter((ram) => {
        if (ram.rotation_speed && ram.type === "HDD" && !sizeRAM.has(ram.rotation_speed)) {
          sizeRAM.add(ram.rotation_speed);
          return true;
        }
        return false;
      });
    };
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[--><div class="mt-4"><label class="block text-md font-semibold mb-1">${ssrInterpolate(unref(t)("storage-capacity"))}</label><!--[-->`);
      ssrRenderList(uniqueSizesDrive(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.size)} class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(option.size >= 1e3 ? option.size / 1e3 + " TB" : option.size + " GB")}</span></label></div>`);
      });
      _push(`<!--]--></div><div class="mt-4"><label class="block text-md font-medium mb-1">${ssrInterpolate(unref(t)("storage-type"))}</label><!--[-->`);
      ssrRenderList(uniqueTypeDrive(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.type)} class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(option.type)}</span></label></div>`);
      });
      _push(`<!--]--></div><div class="mt-4"><label class="block text-md font-medium mb-1">${ssrInterpolate(unref(t)("storage-ssd"))}</label><!--[-->`);
      ssrRenderList(uniqueWritingSpeedDrive(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.writing_speed)} class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(option.writing_speed)} MB/s</span></label></div>`);
      });
      _push(`<!--]--></div><div class="mt-4"><label class="block text-md font-medium mb-1">${ssrInterpolate(unref(t)("storage-hdd"))}</label><!--[-->`);
      ssrRenderList(uniqueRotationArmazenamento(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.rotation_speed)} class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(option.rotation_speed)} RPM</span></label></div>`);
      });
      _push(`<!--]--></div><!--]-->`);
    };
  }
};
const _sfc_setup$L = _sfc_main$L.setup;
_sfc_main$L.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Filters/StorageFilter.vue");
  return _sfc_setup$L ? _sfc_setup$L(props, ctx) : void 0;
};
const _sfc_main$K = {
  __name: "MotherboardFilter",
  __ssrInlineRender: true,
  props: {
    motherboardFormat: Array,
    motherboardChipset: Array,
    motherboardCpuSocket: Array,
    motherboardBluetooth: Array,
    motherboardWifi: Array,
    motherboard: Array
  },
  emits: [
    "update:motherboardFormat",
    "update:motherboardChipset",
    "update:motherboardCpuSocket",
    "update:motherboardBluetooth",
    "update:motherboardWifi"
  ],
  setup(__props, { emit: __emit }) {
    const { t } = useI18n();
    const props = __props;
    const uniqueFormat = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.motherboard.filter((ram) => {
        if (!sizeRAM.has(ram.format)) {
          sizeRAM.add(ram.format);
          return true;
        }
        return false;
      });
    };
    const uniqueChipset = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.motherboard.filter((ram) => {
        if (!sizeRAM.has(ram.chipset)) {
          sizeRAM.add(ram.chipset);
          return true;
        }
        return false;
      });
    };
    const uniqueCpuSocket = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.motherboard.filter((ram) => {
        if (!sizeRAM.has(ram.cpu_socket)) {
          sizeRAM.add(ram.cpu_socket);
          return true;
        }
        return false;
      });
    };
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[--><div class="mt-4"><label class="block text-md font-semibold mb-1">${ssrInterpolate(unref(t)("motherboard-format"))}</label><!--[-->`);
      ssrRenderList(uniqueFormat(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.format)} class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(option.format)}</span></label></div>`);
      });
      _push(`<!--]--></div><div class="mt-4"><label class="block text-md font-semibold mb-1">${ssrInterpolate(unref(t)("motherboard-chipset"))}</label><!--[-->`);
      ssrRenderList(uniqueChipset(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.chipset)} class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(option.chipset)}</span></label></div>`);
      });
      _push(`<!--]--></div><div class="mt-4"><label class="block text-md font-semibold mb-1">${ssrInterpolate(unref(t)("motherboard-cpu-socket"))}</label><!--[-->`);
      ssrRenderList(uniqueCpuSocket(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.cpu_socket)} class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(option.cpu_socket)}</span></label></div>`);
      });
      _push(`<!--]--></div><div class="mt-4"><label class="block text-md font-medium mb-1">${ssrInterpolate(unref(t)("motherboard-wifi"))}</label><div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox" value="true" class="form-checkbox size-4"><span class="ml-2">Sim</span></label></div></div><div class="mt-4"><label class="block text-md font-medium mb-1">${ssrInterpolate(unref(t)("motherboard-bluetooth"))}</label><div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox" value="true" class="form-checkbox size-4"><span class="ml-2">Sim</span></label></div></div><!--]-->`);
    };
  }
};
const _sfc_setup$K = _sfc_main$K.setup;
_sfc_main$K.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Filters/MotherboardFilter.vue");
  return _sfc_setup$K ? _sfc_setup$K(props, ctx) : void 0;
};
const _sfc_main$J = {
  __name: "GraphicsCardFilter",
  __ssrInlineRender: true,
  props: {
    modelGPU: Array,
    categoryGPU: String,
    vramGPU: Array,
    typeVramGPU: Array,
    interfaceGPU: Array,
    gpu: Array
  },
  emits: [
    "update:modelGPU",
    "update:categoryGPU",
    "update:vramGPU",
    "update:typeVramGPU",
    "update:interfaceGPU"
  ],
  setup(__props, { emit: __emit }) {
    const { t } = useI18n();
    const props = __props;
    const uniqueGPU = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.gpu.filter((ram) => {
        if (!sizeRAM.has(ram.model)) {
          sizeRAM.add(ram.model);
          return true;
        }
        return false;
      });
    };
    const uniqueCategory = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.gpu.filter((ram) => {
        if (!sizeRAM.has(ram.category)) {
          sizeRAM.add(ram.category);
          return true;
        }
        return false;
      });
    };
    const uniqueVRAM = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.gpu.filter((ram) => {
        if (!sizeRAM.has(ram.vram)) {
          sizeRAM.add(ram.vram);
          return true;
        }
        return false;
      });
    };
    const uniqueTypeVram = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.gpu.filter((ram) => {
        if (!sizeRAM.has(ram.type_vram)) {
          sizeRAM.add(ram.type_vram);
          return true;
        }
        return false;
      });
    };
    const uniqueInterface = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.gpu.filter((ram) => {
        if (!sizeRAM.has(ram.interface)) {
          sizeRAM.add(ram.interface);
          return true;
        }
        return false;
      });
    };
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[--><div class="mt-4"><label class="block text-md font-semibold mb-1">${ssrInterpolate(unref(t)("gpu-category"))}</label><select${ssrRenderAttr("value", __props.categoryGPU)} class="w-full border p-1 rounded"><!--[-->`);
      ssrRenderList(uniqueCategory(), (manu) => {
        _push(`<option${ssrRenderAttr("value", manu.id)}>${ssrInterpolate(manu.category)}</option>`);
      });
      _push(`<!--]--></select></div><div class="mt-4"><label class="block text-md font-semibold mb-1">${ssrInterpolate(unref(t)("gpu-model"))}</label><!--[-->`);
      ssrRenderList(uniqueGPU(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.model)} class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(option.model)}</span></label></div>`);
      });
      _push(`<!--]--></div><div class="mt-4"><label class="block text-md font-semibold mb-1">${ssrInterpolate(unref(t)("gpu-memory"))}</label><!--[-->`);
      ssrRenderList(uniqueVRAM(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.vram)} class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(option.vram)} GB</span></label></div>`);
      });
      _push(`<!--]--></div><div class="mt-4"><label class="block text-md font-semibold mb-1">${ssrInterpolate(unref(t)("gpu-type-memory"))}</label><!--[-->`);
      ssrRenderList(uniqueTypeVram(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.type_vram)} class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(option.type_vram)}</span></label></div>`);
      });
      _push(`<!--]--></div><div class="mt-4"><label class="block text-md font-semibold mb-1">${ssrInterpolate(unref(t)("gpu-interface"))}</label><!--[-->`);
      ssrRenderList(uniqueInterface(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.interface)} class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(option.interface)}</span></label></div>`);
      });
      _push(`<!--]--></div><!--]-->`);
    };
  }
};
const _sfc_setup$J = _sfc_main$J.setup;
_sfc_main$J.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Filters/GraphicsCardFilter.vue");
  return _sfc_setup$J ? _sfc_setup$J(props, ctx) : void 0;
};
const _sfc_main$I = {
  __name: "PowerSupplyFilter",
  __ssrInlineRender: true,
  props: {
    psuFormat: Array,
    psuWattage: Array,
    psuEfficiency: Array,
    psuModular: Array,
    powersupply: Array
  },
  emits: [
    "update:psuFormat",
    "update:psuWattage",
    "update:psuEfficiency",
    "update:psuModular"
  ],
  setup(__props, { emit: __emit }) {
    const { t } = useI18n();
    const props = __props;
    const uniqueFormat = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.powersupply.filter((ram) => {
        if (!sizeRAM.has(ram.format)) {
          sizeRAM.add(ram.format);
          return true;
        }
        return false;
      });
    };
    const uniqueWattage = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.powersupply.filter((ram) => {
        if (!sizeRAM.has(ram.wattage)) {
          sizeRAM.add(ram.wattage);
          return true;
        }
        return false;
      });
    };
    const uniqueEfficiency = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.powersupply.filter((ram) => {
        if (!sizeRAM.has(ram.efficiency)) {
          sizeRAM.add(ram.efficiency);
          return true;
        }
        return false;
      });
    };
    const uniqueModular = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.powersupply.filter((ram) => {
        if (!sizeRAM.has(ram.modular)) {
          sizeRAM.add(ram.modular);
          return true;
        }
        return false;
      });
    };
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[--><div><div class="mt-4"><label class="block text-md font-semibold mb-1">${ssrInterpolate(unref(t)("psu-format"))}</label><!--[-->`);
      ssrRenderList(uniqueFormat(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.format)} class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(option.format)}</span></label></div>`);
      });
      _push(`<!--]--></div></div><div class="mt-4"><label class="block text-md font-semibold mb-1">${ssrInterpolate(unref(t)("psu-wattage"))}</label><!--[-->`);
      ssrRenderList(uniqueWattage(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.wattage)} class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(option.wattage)} W </span></label></div>`);
      });
      _push(`<!--]--></div><div><div class="mt-4"><label class="block text-md font-semibold mb-1">${ssrInterpolate(unref(t)("psu-efficiency"))}</label><!--[-->`);
      ssrRenderList(uniqueEfficiency(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.efficiency)} class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(option.efficiency)}</span></label></div>`);
      });
      _push(`<!--]--></div></div><div class="mt-4"><label class="block text-md font-medium mb-1">${ssrInterpolate(unref(t)("psu-modular"))}</label><!--[-->`);
      ssrRenderList(uniqueModular(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.modular)} class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(option.modular)}</span></label></div>`);
      });
      _push(`<!--]--></div><!--]-->`);
    };
  }
};
const _sfc_setup$I = _sfc_main$I.setup;
_sfc_main$I.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Filters/PowerSupplyFilter.vue");
  return _sfc_setup$I ? _sfc_setup$I(props, ctx) : void 0;
};
const _sfc_main$H = {
  __name: "CpuCoolersFilter",
  __ssrInlineRender: true,
  props: {
    socketCooler: Array,
    typeCooler: String,
    fanRPMCooler: Array,
    rgbCooler: Array,
    cpuCooler: Array
  },
  emits: [
    "update:socketCooler",
    "update:typeCooler",
    "update:fanRPMCooler",
    "update:rgbCooler"
  ],
  setup(__props, { emit: __emit }) {
    const { t } = useI18n();
    const props = __props;
    const uniqueSocket = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.cpuCooler.filter((ram) => {
        if (!sizeRAM.has(ram.socket)) {
          sizeRAM.add(ram.socket);
          return true;
        }
        return false;
      });
    };
    const uniqueType = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.cpuCooler.filter((ram) => {
        if (!sizeRAM.has(ram.type)) {
          sizeRAM.add(ram.type);
          return true;
        }
        return false;
      });
    };
    const uniqueFanRPM = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.cpuCooler.filter((ram) => {
        if (!sizeRAM.has(ram.fan_rpm)) {
          sizeRAM.add(ram.fan_rpm);
          return true;
        }
        return false;
      });
    };
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[--><div class="mt-4"><label class="block text-md font-semibold mb-1">${ssrInterpolate(unref(t)("coolers-category"))}</label><select${ssrRenderAttr("value", __props.typeCooler)} class="w-full border p-1 rounded"><!--[-->`);
      ssrRenderList(uniqueType(), (manu) => {
        _push(`<option${ssrRenderAttr("value", manu.type)}>${ssrInterpolate(manu.type)}</option>`);
      });
      _push(`<!--]--></select></div><div class="mt-4"><label class="block text-md font-semibold mb-1">${ssrInterpolate(unref(t)("coolers-compatibility"))}</label><!--[-->`);
      ssrRenderList(uniqueSocket(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.socket)} class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(option.socket)}</span></label></div>`);
      });
      _push(`<!--]--></div><div class="mt-4"><label class="block text-md font-semibold mb-1">${ssrInterpolate(unref(t)("coolers-speed"))}</label><!--[-->`);
      ssrRenderList(uniqueFanRPM(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.fan_rpm)} class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(option.fan_rpm)} RPM</span></label></div>`);
      });
      _push(`<!--]--></div><div class="mt-4"><label class="block text-md font-medium mb-1">${ssrInterpolate(unref(t)("coolers-rgb"))}</label><div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox" class="form-checkbox size-4"><span class="ml-2">Sim</span></label></div></div><!--]-->`);
    };
  }
};
const _sfc_setup$H = _sfc_main$H.setup;
_sfc_main$H.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Filters/CpuCoolersFilter.vue");
  return _sfc_setup$H ? _sfc_setup$H(props, ctx) : void 0;
};
const _sfc_main$G = {
  __name: "ComputerCasesFilter",
  __ssrInlineRender: true,
  props: {
    casesFormat: Array,
    casesNumberLowerFans: Array,
    casesNumberUpperFans: Array,
    casesNumberFrontFans: Array,
    casesNumberRearFans: Array,
    temperedGlass: Array,
    casesGpuLength: Array,
    casesCoolerHeight: Array,
    PCcases: Array
  },
  emits: [
    "update:casesFormat",
    "update:casesNumberLowerFans",
    "update:casesNumberUpperFans",
    "update:casesNumberFrontFans",
    "update:casesNumberRearFans",
    "update:temperedGlass",
    "update:casesGpuLength",
    "update:casesCoolerHeight"
  ],
  setup(__props, { emit: __emit }) {
    const { t } = useI18n();
    const props = __props;
    const uniqueFormat = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.PCcases.filter((ram) => {
        if (!sizeRAM.has(ram.format)) {
          sizeRAM.add(ram.format);
          return true;
        }
        return false;
      });
    };
    const uniqueLowerFans = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.PCcases.filter((ram) => {
        if (!sizeRAM.has(ram.number_lower_fans)) {
          sizeRAM.add(ram.number_lower_fans);
          return true;
        }
        return false;
      });
    };
    const uniqueUpperFans = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.PCcases.filter((ram) => {
        if (!sizeRAM.has(ram.number_upper_fans)) {
          sizeRAM.add(ram.number_upper_fans);
          return true;
        }
        return false;
      });
    };
    const uniqueFrontFans = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.PCcases.filter((ram) => {
        if (!sizeRAM.has(ram.number_front_fans)) {
          sizeRAM.add(ram.number_front_fans);
          return true;
        }
        return false;
      });
    };
    const uniqueRearFans = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.PCcases.filter((ram) => {
        if (!sizeRAM.has(ram.number_rear_fans)) {
          sizeRAM.add(ram.number_rear_fans);
          return true;
        }
        return false;
      });
    };
    const uniqueGPUlength = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.PCcases.filter((ram) => {
        if (!sizeRAM.has(ram.max_gpu_length)) {
          sizeRAM.add(ram.max_gpu_length);
          return true;
        }
        return false;
      });
    };
    const uniqueCoolerHeight = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.PCcases.filter((ram) => {
        if (!sizeRAM.has(ram.max_cooler_height)) {
          sizeRAM.add(ram.max_cooler_height);
          return true;
        }
        return false;
      });
    };
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[--><div class="mt-4"><label class="block text-md font-semibold mb-1">${ssrInterpolate(unref(t)("case-format"))}</label><!--[-->`);
      ssrRenderList(uniqueFormat(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.format)} class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(option.format)}</span></label></div>`);
      });
      _push(`<!--]--></div><div><div class="mt-4"><label class="block text-md font-semibold mb-1">${ssrInterpolate(unref(t)("case-glass"))}</label><div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox" value="true" class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(unref(t)("case-glass-option"))}</span></label></div></div></div><div class="mt-4"><label class="block text-md font-semibold mb-1">${ssrInterpolate(unref(t)("case-top-fans"))}</label><!--[-->`);
      ssrRenderList(uniqueUpperFans(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.number_upper_fans)} class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(option.number_upper_fans)}</span></label></div>`);
      });
      _push(`<!--]--></div><div class="mt-4"><label class="block text-md font-semibold mb-1">${ssrInterpolate(unref(t)("case-lower-fans"))}</label><!--[-->`);
      ssrRenderList(uniqueLowerFans(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.number_lower_fans)} class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(option.number_lower_fans)}</span></label></div>`);
      });
      _push(`<!--]--></div><div class="mt-4"><label class="block text-md font-semibold mb-1">${ssrInterpolate(unref(t)("case-front-fans"))}</label><!--[-->`);
      ssrRenderList(uniqueFrontFans(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.number_front_fans)} class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(option.number_front_fans)}</span></label></div>`);
      });
      _push(`<!--]--></div><div class="mt-4"><label class="block text-md font-semibold mb-1">${ssrInterpolate(unref(t)("case-rear-fans"))}</label><!--[-->`);
      ssrRenderList(uniqueRearFans(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.number_rear_fans)} class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(option.number_rear_fans)}</span></label></div>`);
      });
      _push(`<!--]--></div><div class="mt-4"><label class="block text-md font-semibold mb-1">${ssrInterpolate(unref(t)("case-gpu-max"))}</label><!--[-->`);
      ssrRenderList(uniqueGPUlength(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.max_gpu_length)} class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(option.max_gpu_length)} mm </span></label></div>`);
      });
      _push(`<!--]--></div><div class="mt-4"><label class="block text-md font-semibold mb-1">${ssrInterpolate(unref(t)("case-cooler-max"))}</label><!--[-->`);
      ssrRenderList(uniqueCoolerHeight(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.max_cooler_height)} class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(option.max_cooler_height)} mm </span></label></div>`);
      });
      _push(`<!--]--></div><!--]-->`);
    };
  }
};
const _sfc_setup$G = _sfc_main$G.setup;
_sfc_main$G.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Filters/ComputerCasesFilter.vue");
  return _sfc_setup$G ? _sfc_setup$G(props, ctx) : void 0;
};
const _sfc_main$F = {
  __name: "SmartphonesFilter",
  __ssrInlineRender: true,
  props: {
    capacityStorage: Array,
    SIM: Array,
    familyCPU: Array,
    CPU: Array,
    operating_system: Array,
    screen_resolution: Array,
    screen_inches: Array,
    screen_hz: Array,
    screen_type: Array,
    smartphone: Array
  },
  emits: [
    "update:capacityStorage",
    "update:SIM",
    "update:familyCPU",
    "update:CPU",
    "update:operating_system",
    "update:screen_resolution",
    "update:screen_inches",
    "update:screen_hz",
    "update:screen_type"
  ],
  setup(__props, { emit: __emit }) {
    const { t } = useI18n();
    const props = __props;
    const uniqueSmartphoneStorage = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.smartphone.filter((ram) => {
        if (!sizeRAM.has(ram.storage)) {
          sizeRAM.add(ram.storage);
          return true;
        }
        return false;
      });
    };
    const uniqueSIM = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.smartphone.filter((ram) => {
        if (!sizeRAM.has(ram.SIM)) {
          sizeRAM.add(ram.SIM);
          return true;
        }
        return false;
      });
    };
    const uniqueFamilyCPU = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.smartphone.filter((ram) => {
        if (!sizeRAM.has(ram.family_processor)) {
          sizeRAM.add(ram.family_processor);
          return true;
        }
        return false;
      });
    };
    const uniqueCPU = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.smartphone.filter((ram) => {
        if (!sizeRAM.has(ram.processor)) {
          sizeRAM.add(ram.processor);
          return true;
        }
        return false;
      });
    };
    const uniqueOS = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.smartphone.filter((ram) => {
        if (!sizeRAM.has(ram.operating_system)) {
          sizeRAM.add(ram.operating_system);
          return true;
        }
        return false;
      });
    };
    const uniqueResolution = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.smartphone.filter((ram) => {
        if (!sizeRAM.has(ram.screen_resolution)) {
          sizeRAM.add(ram.screen_resolution);
          return true;
        }
        return false;
      });
    };
    const uniqueInches = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.smartphone.filter((ram) => {
        if (!sizeRAM.has(ram.screen_inches)) {
          sizeRAM.add(ram.screen_inches);
          return true;
        }
        return false;
      });
    };
    const uniqueHz = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.smartphone.filter((ram) => {
        if (!sizeRAM.has(ram.screen_hz)) {
          sizeRAM.add(ram.screen_hz);
          return true;
        }
        return false;
      });
    };
    const uniqueType = () => {
      const sizeRAM = /* @__PURE__ */ new Set();
      return props.smartphone.filter((ram) => {
        if (!sizeRAM.has(ram.screen_type)) {
          sizeRAM.add(ram.screen_type);
          return true;
        }
        return false;
      });
    };
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[--><div class="mt-4"><label class="block text-md font-semibold mb-1">Capacidade de Armazenamento</label><!--[-->`);
      ssrRenderList(uniqueSmartphoneStorage(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.storage)} class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(option.storage)} GB</span></label></div>`);
      });
      _push(`<!--]--></div><div class="mt-4"><label class="block text-md font-semibold mb-1">Capacidade cartão SIM</label><!--[-->`);
      ssrRenderList(uniqueSIM(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.SIM)} class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(option.SIM)}</span></label></div>`);
      });
      _push(`<!--]--></div><div class="mt-4"><label class="block text-md font-semibold mb-1">Família Processador</label><!--[-->`);
      ssrRenderList(uniqueFamilyCPU(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.family_processor)} class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(option.family_processor)}</span></label></div>`);
      });
      _push(`<!--]--></div><div class="mt-4"><label class="block text-md font-semibold mb-1">Processador</label><!--[-->`);
      ssrRenderList(uniqueCPU(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.processor)} class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(option.processor)}</span></label></div>`);
      });
      _push(`<!--]--></div><div class="mt-4"><label class="block text-md font-semibold mb-1">Sistema Operativo</label><!--[-->`);
      ssrRenderList(uniqueOS(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.operating_system)} class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(option.operating_system)}</span></label></div>`);
      });
      _push(`<!--]--></div><div class="mt-4"><label class="block text-md font-semibold mb-1">Resolução</label><!--[-->`);
      ssrRenderList(uniqueResolution(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.screen_resolution)} class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(option.screen_resolution)}</span></label></div>`);
      });
      _push(`<!--]--></div><div class="mt-4"><label class="block text-md font-semibold mb-1">Polegadas</label><!--[-->`);
      ssrRenderList(uniqueInches(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.screen_inches)} class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(option.screen_inches)}&quot;</span></label></div>`);
      });
      _push(`<!--]--></div><div class="mt-4"><label class="block text-md font-semibold mb-1">Taxa de atualização</label><!--[-->`);
      ssrRenderList(uniqueHz(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.screen_hz)} class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(option.screen_hz)} Hz</span></label></div>`);
      });
      _push(`<!--]--></div><div class="mt-4"><label class="block text-md font-semibold mb-1">Tipo de Painel</label><!--[-->`);
      ssrRenderList(uniqueType(), (option) => {
        _push(`<div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox"${ssrRenderAttr("value", option.screen_type)} class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(option.screen_type)}</span></label></div>`);
      });
      _push(`<!--]--></div><!--]-->`);
    };
  }
};
const _sfc_setup$F = _sfc_main$F.setup;
_sfc_main$F.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Filters/SmartphonesFilter.vue");
  return _sfc_setup$F ? _sfc_setup$F(props, ctx) : void 0;
};
const _sfc_main$E = {
  __name: "DefaultFilters",
  __ssrInlineRender: true,
  props: {
    sort: String,
    stock: String,
    nostock: String,
    minPrice: String,
    maxPrice: String,
    manufacturerValue: String,
    manufacturer: Array,
    discount: String,
    reconditioned: String
  },
  emits: [
    "update:sort",
    "update:stock",
    "update:nostock",
    "update:minPrice",
    "update:maxPrice",
    "update:manufacturer",
    "update:discount",
    "update:reconditioned",
    "update:subcategory"
  ],
  setup(__props, { emit: __emit }) {
    const { t } = useI18n();
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[--><div class="mt-4"><label class="block text-md font-semibold mb-1">${ssrInterpolate(unref(t)("filters-sort-by"))}</label><select class="w-full border p-1 rounded"><option value="-created_at">${ssrInterpolate(unref(t)("filters-most-recent"))}</option><option value="price">${ssrInterpolate(unref(t)("filters-lowest-price"))}</option><option value="-price">${ssrInterpolate(unref(t)("filters-highest-price"))}</option></select></div><div class="mt-4"><label class="block text-md font-semibold mb-1">${ssrInterpolate(unref(t)("filters-stock"))}</label><div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox" class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(unref(t)("filters-in-stock"))}</span></label><label class="inline-flex items-center"><input type="checkbox" class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(unref(t)("filters-out-of-stock"))}</span></label></div></div><div class="mt-4"><label class="block text-md font-semibold mb-1">${ssrInterpolate(unref(t)("filters-price"))}</label><div class="flex items-center space-x-4"><input type="number" placeholder="min" class="w-1/3 border p-1 rounded"><input type="number" placeholder="max" class="w-1/3 border p-1 rounded"></div></div><div class="mt-4"><label class="block text-md font-semibold mb-1">${ssrInterpolate(unref(t)("filters-manufacturer"))}</label><select${ssrRenderAttr("value", __props.manufacturerValue)} class="w-full border p-1 rounded"><!--[-->`);
      ssrRenderList(__props.manufacturer, (manu) => {
        _push(`<option${ssrRenderAttr("value", manu.id)}>${ssrInterpolate(manu.name)}</option>`);
      });
      _push(`<!--]--></select></div><div class="mt-4"><label class="block text-md font-semibold mb-1">${ssrInterpolate(unref(t)("filters-product-status"))}</label><div class="flex items-center space-x-4"><label class="inline-flex items-center"><input type="checkbox" class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(unref(t)("filters-discount"))}</span></label><label class="inline-flex items-center"><input type="checkbox" class="form-checkbox size-4"><span class="ml-2">${ssrInterpolate(unref(t)("filters-reconditioned"))}</span></label></div></div><!--]-->`);
    };
  }
};
const _sfc_setup$E = _sfc_main$E.setup;
_sfc_main$E.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Filters/DefaultFilters.vue");
  return _sfc_setup$E ? _sfc_setup$E(props, ctx) : void 0;
};
const _sfc_main$D = {
  __name: "FilterBar",
  __ssrInlineRender: true,
  props: {
    manufacturer: Array,
    subcategory: Array,
    category: Array,
    ram: Array,
    cpu: Array,
    armazenamento: Array,
    motherboard: Array,
    gpu: Array,
    powersupply: Array,
    cpuCooler: Array,
    PCcases: Array,
    smartphone: Array
  },
  setup(__props) {
    const { t } = useI18n();
    const page = usePage();
    const currentPath = page.url;
    const discountPage = currentPath.includes("/promocoes");
    const ramPage2 = currentPath.includes("/components/ram-memory");
    const cpuPage2 = currentPath.includes("/components/processors");
    const storagePage = currentPath.includes("/components/storage");
    const motherboardPage = currentPath.includes("/components/motherboards");
    const gpuPage2 = currentPath.includes("/components/graphic-cards");
    const psuPage = currentPath.includes("/components/power-supplies");
    const cpuCoolerPage = currentPath.includes("/components/cpu-coolers");
    const pcCasesPage = currentPath.includes("/components/computer-cases");
    const smartphonePage = currentPath.includes("/smartphones");
    const selectedFilters = ref({
      manufacturer: "",
      stock: "",
      nostock: "",
      sort: "",
      max_price: "",
      min_price: "",
      category: "",
      subcategory: "",
      promotion: "",
      reconditioned: "",
      memoria_ram: [],
      type_ram: [],
      frequecy_ram: [],
      latency_ram: [],
      cpu: [],
      cpu_socket: [],
      cpu_tdp: [],
      storage: [],
      storage_type: [],
      writing_speed_storage: [],
      rotation_speed_storage: [],
      motherboard_format: [],
      motherboard_chipset: [],
      motherboard_cpu_socket: [],
      motherboard_bluetooth: [],
      motherboard_wifi: [],
      gpu_model: [],
      gpu_category: "",
      gpu_vram: [],
      gpu_type_vram: [],
      gpu_interface: [],
      psu_format: [],
      psu_wattage: [],
      psu_efficiency: [],
      psu_modular: [],
      cooler_socket: [],
      cooler_type: "",
      cooler_fan_rpm: [],
      cooler_rgb: [],
      case_format: [],
      case_number_lower_fans: [],
      case_number_upper_fans: [],
      case_number_front_fans: [],
      case_number_rear_fans: [],
      case_tempered_glass: [],
      case_max_gpu_length: [],
      case_max_cooler_height: [],
      smartphone_storage: [],
      smartphone_SIM: [],
      smartphone_family_cpu: [],
      smartphone_cpu: [],
      smartphone_os: [],
      smartphone_screen_resolution: [],
      smartphones_screen_inches: [],
      smartphones_screen_hz: [],
      smartphones_screen_type: []
    });
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "overflow-y-auto mt-8 h-screen w-full bg-white shadow-lg p-4 rounded-lg" }, _attrs))}><h2 class="text-2xl font-bold mb-4">${ssrInterpolate(unref(t)("filters-page-title"))}</h2>`);
      _push(ssrRenderComponent(_sfc_main$E, {
        manufacturer: __props.manufacturer,
        manufacturerValue: selectedFilters.value.manufacturer,
        "onUpdate:manufacturerValue": ($event) => selectedFilters.value.manufacturer = $event,
        sort: selectedFilters.value.sort,
        "onUpdate:sort": ($event) => selectedFilters.value.sort = $event,
        stock: selectedFilters.value.stock,
        "onUpdate:stock": ($event) => selectedFilters.value.stock = $event,
        nostock: selectedFilters.value.nostock,
        "onUpdate:nostock": ($event) => selectedFilters.value.nostock = $event,
        minPrice: selectedFilters.value.min_price,
        "onUpdate:minPrice": ($event) => selectedFilters.value.min_price = $event,
        maxPrice: selectedFilters.value.max_price,
        "onUpdate:maxPrice": ($event) => selectedFilters.value.max_price = $event,
        "onUpdate:manufacturer": ($event) => selectedFilters.value.manufacturer = $event
      }, null, _parent));
      if (!unref(cpuPage2) && !unref(motherboardPage) && !unref(storagePage) && !unref(gpuPage2) && !unref(psuPage) && !unref(cpuCoolerPage) && !unref(pcCasesPage) && !unref(discountPage) && !unref(smartphonePage)) {
        _push(ssrRenderComponent(_sfc_main$N, {
          ram: __props.ram,
          capacityRam: selectedFilters.value.memoria_ram,
          "onUpdate:capacityRam": ($event) => selectedFilters.value.memoria_ram = $event,
          typeRam: selectedFilters.value.type_ram,
          "onUpdate:typeRam": ($event) => selectedFilters.value.type_ram = $event,
          frequencyRam: selectedFilters.value.frequecy_ram,
          "onUpdate:frequencyRam": ($event) => selectedFilters.value.frequecy_ram = $event,
          latencyRam: selectedFilters.value.latency_ram,
          "onUpdate:latencyRam": ($event) => selectedFilters.value.latency_ram = $event
        }, null, _parent));
      } else {
        _push(`<!---->`);
      }
      if (!unref(ramPage2) && !unref(motherboardPage) && !unref(storagePage) && !unref(gpuPage2) && !unref(psuPage) && !unref(cpuCoolerPage) && !unref(pcCasesPage) && !unref(discountPage) && !unref(smartphonePage)) {
        _push(ssrRenderComponent(_sfc_main$M, {
          cpu: __props.cpu,
          modelCPU: selectedFilters.value.cpu,
          "onUpdate:modelCPU": ($event) => selectedFilters.value.cpu = $event,
          socketCPU: selectedFilters.value.cpu_socket,
          "onUpdate:socketCPU": ($event) => selectedFilters.value.cpu_socket = $event,
          tdpCPU: selectedFilters.value.cpu_tdp,
          "onUpdate:tdpCPU": ($event) => selectedFilters.value.cpu_tdp = $event
        }, null, _parent));
      } else {
        _push(`<!---->`);
      }
      if (!unref(ramPage2) && !unref(motherboardPage) && !unref(cpuPage2) && !unref(gpuPage2) && !unref(psuPage) && !unref(cpuCoolerPage) && !unref(pcCasesPage) && !unref(discountPage) && !unref(smartphonePage)) {
        _push(ssrRenderComponent(_sfc_main$L, {
          armazenamento: __props.armazenamento,
          capacityDrive: selectedFilters.value.storage,
          "onUpdate:capacityDrive": ($event) => selectedFilters.value.storage = $event,
          typeDrive: selectedFilters.value.storage_type,
          "onUpdate:typeDrive": ($event) => selectedFilters.value.storage_type = $event,
          writingSpeedDrive: selectedFilters.value.writing_speed_storage,
          "onUpdate:writingSpeedDrive": ($event) => selectedFilters.value.writing_speed_storage = $event,
          rotationSpeedDrive: selectedFilters.value.rotation_speed_storage,
          "onUpdate:rotationSpeedDrive": ($event) => selectedFilters.value.rotation_speed_storage = $event
        }, null, _parent));
      } else {
        _push(`<!---->`);
      }
      if (!unref(ramPage2) && !unref(storagePage) && !unref(cpuPage2) && !unref(gpuPage2) && !unref(psuPage) && !unref(cpuCoolerPage) && !unref(pcCasesPage) && !unref(discountPage) && !unref(smartphonePage)) {
        _push(ssrRenderComponent(_sfc_main$K, {
          motherboard: __props.motherboard,
          motherboardFormat: selectedFilters.value.motherboard_format,
          "onUpdate:motherboardFormat": ($event) => selectedFilters.value.motherboard_format = $event,
          motherboardChipset: selectedFilters.value.motherboard_chipset,
          "onUpdate:motherboardChipset": ($event) => selectedFilters.value.motherboard_chipset = $event,
          motherboardCpuSocket: selectedFilters.value.motherboard_cpu_socket,
          "onUpdate:motherboardCpuSocket": ($event) => selectedFilters.value.motherboard_cpu_socket = $event,
          motherboardBluetooth: selectedFilters.value.motherboard_bluetooth,
          "onUpdate:motherboardBluetooth": ($event) => selectedFilters.value.motherboard_bluetooth = $event,
          motherboardWifi: selectedFilters.value.motherboard_wifi,
          "onUpdate:motherboardWifi": ($event) => selectedFilters.value.motherboard_wifi = $event
        }, null, _parent));
      } else {
        _push(`<!---->`);
      }
      if (!unref(ramPage2) && !unref(storagePage) && !unref(cpuPage2) && !unref(motherboardPage) && !unref(psuPage) && !unref(cpuCoolerPage) && !unref(pcCasesPage) && !unref(discountPage) && !unref(smartphonePage)) {
        _push(ssrRenderComponent(_sfc_main$J, {
          gpu: __props.gpu,
          modelGPU: selectedFilters.value.gpu_model,
          "onUpdate:modelGPU": ($event) => selectedFilters.value.gpu_model = $event,
          categoryGPU: selectedFilters.value.gpu_category,
          "onUpdate:categoryGPU": ($event) => selectedFilters.value.gpu_category = $event,
          vramGPU: selectedFilters.value.gpu_vram,
          "onUpdate:vramGPU": ($event) => selectedFilters.value.gpu_vram = $event,
          typeVramGPU: selectedFilters.value.gpu_type_vram,
          "onUpdate:typeVramGPU": ($event) => selectedFilters.value.gpu_type_vram = $event,
          interfaceGPU: selectedFilters.value.gpu_interface,
          "onUpdate:interfaceGPU": ($event) => selectedFilters.value.gpu_interface = $event
        }, null, _parent));
      } else {
        _push(`<!---->`);
      }
      if (!unref(ramPage2) && !unref(storagePage) && !unref(cpuPage2) && !unref(motherboardPage) && !unref(gpuPage2) && !unref(cpuCoolerPage) && !unref(pcCasesPage) && !unref(discountPage) && !unref(smartphonePage)) {
        _push(ssrRenderComponent(_sfc_main$I, {
          powersupply: __props.powersupply,
          psuFormat: selectedFilters.value.psu_format,
          "onUpdate:psuFormat": ($event) => selectedFilters.value.psu_format = $event,
          psuWattage: selectedFilters.value.psu_wattage,
          "onUpdate:psuWattage": ($event) => selectedFilters.value.psu_wattage = $event,
          psuEfficiency: selectedFilters.value.psu_efficiency,
          "onUpdate:psuEfficiency": ($event) => selectedFilters.value.psu_efficiency = $event,
          psuModular: selectedFilters.value.psu_modular,
          "onUpdate:psuModular": ($event) => selectedFilters.value.psu_modular = $event
        }, null, _parent));
      } else {
        _push(`<!---->`);
      }
      if (!unref(ramPage2) && !unref(storagePage) && !unref(cpuPage2) && !unref(motherboardPage) && !unref(gpuPage2) && !unref(psuPage) && !unref(pcCasesPage) && !unref(discountPage) && !unref(smartphonePage)) {
        _push(ssrRenderComponent(_sfc_main$H, {
          cpuCooler: __props.cpuCooler,
          socketCooler: selectedFilters.value.cooler_socket,
          "onUpdate:socketCooler": ($event) => selectedFilters.value.cooler_socket = $event,
          typeCooler: selectedFilters.value.cooler_type,
          "onUpdate:typeCooler": ($event) => selectedFilters.value.cooler_type = $event,
          fanRPMCooler: selectedFilters.value.cooler_fan_rpm,
          "onUpdate:fanRPMCooler": ($event) => selectedFilters.value.cooler_fan_rpm = $event,
          rgbCooler: selectedFilters.value.cooler_rgb,
          "onUpdate:rgbCooler": ($event) => selectedFilters.value.cooler_rgb = $event
        }, null, _parent));
      } else {
        _push(`<!---->`);
      }
      if (!unref(ramPage2) && !unref(storagePage) && !unref(cpuPage2) && !unref(motherboardPage) && !unref(gpuPage2) && !unref(psuPage) && !unref(cpuCoolerPage) && !unref(discountPage) && !unref(smartphonePage)) {
        _push(ssrRenderComponent(_sfc_main$G, {
          PCcases: __props.PCcases,
          casesFormat: selectedFilters.value.case_format,
          "onUpdate:casesFormat": ($event) => selectedFilters.value.case_format = $event,
          casesNumberLowerFans: selectedFilters.value.case_number_lower_fans,
          "onUpdate:casesNumberLowerFans": ($event) => selectedFilters.value.case_number_lower_fans = $event,
          casesNumberUpperFans: selectedFilters.value.case_number_upper_fans,
          "onUpdate:casesNumberUpperFans": ($event) => selectedFilters.value.case_number_upper_fans = $event,
          casesNumberFrontFans: selectedFilters.value.case_number_front_fans,
          "onUpdate:casesNumberFrontFans": ($event) => selectedFilters.value.case_number_front_fans = $event,
          casesNumberRearFans: selectedFilters.value.case_number_rear_fans,
          "onUpdate:casesNumberRearFans": ($event) => selectedFilters.value.case_number_rear_fans = $event,
          temperedGlass: selectedFilters.value.case_tempered_glass,
          "onUpdate:temperedGlass": ($event) => selectedFilters.value.case_tempered_glass = $event,
          casesGpuLength: selectedFilters.value.case_max_gpu_length,
          "onUpdate:casesGpuLength": ($event) => selectedFilters.value.case_max_gpu_length = $event,
          casesCoolerHeight: selectedFilters.value.case_max_cooler_height,
          "onUpdate:casesCoolerHeight": ($event) => selectedFilters.value.case_max_cooler_height = $event
        }, null, _parent));
      } else {
        _push(`<!---->`);
      }
      if (unref(smartphonePage)) {
        _push(ssrRenderComponent(_sfc_main$F, {
          smartphone: __props.smartphone,
          capacityStorage: selectedFilters.value.smartphone_storage,
          "onUpdate:capacityStorage": ($event) => selectedFilters.value.smartphone_storage = $event,
          SIM: selectedFilters.value.smartphone_SIM,
          "onUpdate:SIM": ($event) => selectedFilters.value.smartphone_SIM = $event,
          familyCPU: selectedFilters.value.smartphone_family_cpu,
          "onUpdate:familyCPU": ($event) => selectedFilters.value.smartphone_family_cpu = $event,
          CPU: selectedFilters.value.smartphone_cpu,
          "onUpdate:CPU": ($event) => selectedFilters.value.smartphone_cpu = $event,
          operating_system: selectedFilters.value.smartphone_os,
          "onUpdate:operating_system": ($event) => selectedFilters.value.smartphone_os = $event,
          screen_resolution: selectedFilters.value.smartphone_screen_resolution,
          "onUpdate:screen_resolution": ($event) => selectedFilters.value.smartphone_screen_resolution = $event,
          screen_inches: selectedFilters.value.smartphones_screen_inches,
          "onUpdate:screen_inches": ($event) => selectedFilters.value.smartphones_screen_inches = $event,
          screen_hz: selectedFilters.value.smartphones_screen_hz,
          "onUpdate:screen_hz": ($event) => selectedFilters.value.smartphones_screen_hz = $event,
          screen_type: selectedFilters.value.smartphones_screen_type,
          "onUpdate:screen_type": ($event) => selectedFilters.value.smartphones_screen_type = $event
        }, null, _parent));
      } else {
        _push(`<!---->`);
      }
      _push(`<button class="mt-4 w-full bg-blue-500 hover:bg-blue-700 text-white py-2 rounded">${ssrInterpolate(unref(t)("filters-apply-filters"))}</button></div>`);
    };
  }
};
const _sfc_setup$D = _sfc_main$D.setup;
_sfc_main$D.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Filters/FilterBar.vue");
  return _sfc_setup$D ? _sfc_setup$D(props, ctx) : void 0;
};
const _sfc_main$C = {
  components: {
    navbar: Navbar,
    Product: Product$1,
    Pagination,
    FilterSideBar: _sfc_main$D
  },
  props: {
    products: {
      type: [Array, Object],
      default: () => []
    },
    Utilizador: {
      type: Object
    },
    buttons: {
      type: Array,
      required: true
    },
    isAdmin: {
      type: Boolean
    },
    category: {
      type: Array,
      required: true
    },
    subcategory: {
      type: Array,
      required: true
    },
    manufacturer: {
      type: Array,
      required: true
    }
  }
};
function _sfc_ssrRender$x(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_navbar = resolveComponent("navbar");
  const _component_FilterSideBar = resolveComponent("FilterSideBar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"> Acessórios </h1><div class="flex gap-5 px-8"><div class="w-1/4">`);
  _push(ssrRenderComponent(_component_FilterSideBar, {
    manufacturer: $props.manufacturer,
    products: $props.products.data,
    category: $props.category,
    subcategory: $props.subcategory
  }, null, _parent));
  _push(`</div><div class="w-3/4">`);
  _push(ssrRenderComponent(_component_Product, {
    products: $props.products.data,
    category: $props.category,
    subcategory: $props.subcategory,
    manufacturer: $props.manufacturer
  }, null, _parent));
  _push(ssrRenderComponent(_component_Pagination, {
    links: $props.products.links
  }, null, _parent));
  _push(`</div></div></div>`);
}
const _sfc_setup$C = _sfc_main$C.setup;
_sfc_main$C.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Acessorios/acessoriosPage.vue");
  return _sfc_setup$C ? _sfc_setup$C(props, ctx) : void 0;
};
const acessoriosPage = /* @__PURE__ */ _export_sfc(_sfc_main$C, [["ssrRender", _sfc_ssrRender$x]]);
const __vite_glob_0_3 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: acessoriosPage
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$B = {
  data() {
    return {
      dropdownNavbarStates: {}
    };
  },
  props: {
    adminBtn: {
      type: Array,
      required: true
    },
    Utilizador: {
      type: Object,
      required: true
    }
  },
  computed: {
    filterButtonsNotDropDown() {
      const DropdownButtons = ["Olá", "Terminar Sessão"];
      return this.adminBtn.filter(
        (btn) => !DropdownButtons.includes(btn.button_name)
      );
    },
    filterButtonsDropDownMenuLogged() {
      const DropdownButtons = ["Olá", "Terminar Sessão"];
      return this.adminBtn.filter(
        (btn) => DropdownButtons.includes(btn.button_name)
      );
    }
  },
  methods: {
    toggleDropdownNavbar(btnId) {
      if (this.dropdownNavbarStates[btnId]) {
        this.dropdownNavbarStates[btnId] = false;
      } else {
        this.dropdownNavbarStates[btnId] = true;
      }
    },
    isDropdownNavbarOpen(btnId) {
      return this.dropdownNavbarStates[btnId] === true;
    },
    redirect(route) {
      this.$inertia.visit(route);
    }
  }
};
function _sfc_ssrRender$w(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_fa = resolveComponent("fa");
  _push(`<div${ssrRenderAttrs(mergeProps({
    class: "hs-overlay [--auto-close:lg] lg:block lg:translate-x-0 lg:end-auto lg:bottom-0 w-64 hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform h-full hidden fixed top-0 start-0 bottom-0 z-60 bg-white shadow-lg border-e border-gray-200",
    tabindex: "-1",
    "aria-label": "Sidebar"
  }, _attrs))}><div class="relative flex flex-col h-full max-h-full"><header class="p-4 flex items-center gap-x-2"><a class="flex-none font-semibold text-xl text-blue-600 focus:outline-hidden focus:opacity-80" href="/" aria-label="Brand">MaRca</a></header><nav class="h-full overflow-y-auto [&amp;::-webkit-scrollbar]:w-2 [&amp;::-webkit-scrollbar-thumb]:rounded-full [&amp;::-webkit-scrollbar-track]:bg-gray-100 [&amp;::-webkit-scrollbar-thumb]:bg-gray-300"><!--[-->`);
  ssrRenderList($options.filterButtonsNotDropDown, (btn) => {
    _push(`<div class="relative"><button class="w-full flex items-center justify-between p-3 text-gray-600 hover:text-blue-600 hover:bg-gray-50 rounded-lg transition-all duration-300"><span class="flex items-center gap-2">`);
    if (btn.icon) {
      _push(ssrRenderComponent(_component_fa, {
        icon: btn.icon,
        class: "text-lg"
      }, null, _parent));
    } else {
      _push(`<!---->`);
    }
    _push(`<span>${ssrInterpolate(btn.button_name)}</span></span></button>`);
    if (btn.dropdown && $options.isDropdownNavbarOpen(btn.id)) {
      _push(`<ul class="ml-4 mt-1 space-y-1 border-l border-gray-200 pl-3"><!--[-->`);
      ssrRenderList(JSON.parse(btn.dropdownOptions), (option) => {
        _push(`<li class="cursor-pointer text-slate-800 hover:text-blue-600"><span class="flex items-center gap-2">`);
        if (option.icon) {
          _push(ssrRenderComponent(_component_fa, {
            icon: option.icon,
            class: "text-lg"
          }, null, _parent));
        } else {
          _push(`<!---->`);
        }
        _push(`<span>${ssrInterpolate(option.button_name)}</span></span></li>`);
      });
      _push(`<!--]--></ul>`);
    } else {
      _push(`<!---->`);
    }
    _push(`</div>`);
  });
  _push(`<!--]--><div class="absolute bottom-0 left-0 my-10 w-full bg-gray-100 p-2 shadow-sm"><!--[-->`);
  ssrRenderList($options.filterButtonsDropDownMenuLogged, (btn) => {
    _push(`<div><button class="w-full flex items-center justify-between p-3 text-gray-600 hover:text-blue-600 hover:bg-gray-50 rounded-lg transition-all duration-300"><span class="flex items-center gap-2">`);
    if (btn.icon) {
      _push(ssrRenderComponent(_component_fa, {
        icon: btn.icon,
        class: "text-lg"
      }, null, _parent));
    } else {
      _push(`<!---->`);
    }
    _push(`<span>${ssrInterpolate(btn.button_name)}, ${ssrInterpolate($props.Utilizador.name)}</span></span></button>`);
    if (btn.dropdown && $options.isDropdownNavbarOpen(btn.id)) {
      _push(`<ul class="ml-4 mt-1 space-y-1 border-l border-gray-200 pl-3"><!--[-->`);
      ssrRenderList(JSON.parse(
        btn.dropdownOptions
      ), (option) => {
        _push(`<li class="cursor-pointer text-slate-800 hover:text-blue-600"><span class="flex items-center gap-2">`);
        if (option.icon) {
          _push(ssrRenderComponent(_component_fa, {
            icon: option.icon,
            class: "text-lg"
          }, null, _parent));
        } else {
          _push(`<!---->`);
        }
        _push(`<span>${ssrInterpolate(option.button_name)}</span></span></li>`);
      });
      _push(`<!--]--></ul>`);
    } else {
      _push(`<!---->`);
    }
    _push(`</div>`);
  });
  _push(`<!--]--></div></nav></div></div>`);
}
const _sfc_setup$B = _sfc_main$B.setup;
_sfc_main$B.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Buttons/AdminNavbar/navbar.vue");
  return _sfc_setup$B ? _sfc_setup$B(props, ctx) : void 0;
};
const navbar = /* @__PURE__ */ _export_sfc(_sfc_main$B, [["ssrRender", _sfc_ssrRender$w]]);
const __default__$2 = {
  props: {
    adminBtn: {
      type: Array,
      required: true
    },
    categories: {
      type: Array,
      required: true
    },
    subcategories: {
      type: Array,
      required: true
    },
    Utilizador: {
      type: Object,
      required: true
    },
    manufacturer: {
      type: Array,
      required: true
    }
  }
};
const _sfc_main$A = /* @__PURE__ */ Object.assign(__default__$2, {
  __name: "addProduto",
  __ssrInlineRender: true,
  setup(__props) {
    const form = reactive({
      name: "",
      manufacturer_id: "",
      price: "",
      sale_price: "",
      description: "",
      category_id: "",
      subcategory_id: "",
      image: null,
      stock: ""
    });
    const Discount = () => {
      const Discount2 = form.price * (form.sale_price / 100);
      const FinalDiscount = form.price - Discount2;
      return FinalDiscount.toFixed(2);
    };
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[-->`);
      _push(ssrRenderComponent(navbar, {
        adminBtn: __props.adminBtn,
        Utilizador: __props.Utilizador
      }, null, _parent));
      _push(`<div class="max-w-2xl mx-auto p-6 mt-5"><h1 class="text-3xl font-bold mb-6 text-gray-800 text-center"> Adicionar Produtos </h1><form class="space-y-4"><div><label for="name" class="block mb-2 text-sm font-medium text-gray-700"> Nome do produto: </label><input id="name"${ssrRenderAttr("value", form.name)} class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition" autocomplete="name"></div><div><label for="manufacturer" class="block mb-2 text-sm font-medium text-gray-700"> Fabricante: </label><select class="w-full bg-gray-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out"><option disabled value=""${ssrIncludeBooleanAttr(Array.isArray(form.manufacturer_id) ? ssrLooseContain(form.manufacturer_id, "") : ssrLooseEqual(form.manufacturer_id, "")) ? " selected" : ""}>Selecione um Fabricante</option><!--[-->`);
      ssrRenderList(__props.manufacturer, (manu) => {
        _push(`<option${ssrRenderAttr("value", manu.id)}${ssrIncludeBooleanAttr(Array.isArray(form.manufacturer_id) ? ssrLooseContain(form.manufacturer_id, manu.id) : ssrLooseEqual(form.manufacturer_id, manu.id)) ? " selected" : ""}>${ssrInterpolate(manu.name)}</option>`);
      });
      _push(`<!--]--></select></div><div><label for="price" class="block mb-2 text-sm font-medium text-gray-700"> Preço: </label><input id="price" type="number" step="0.01"${ssrRenderAttr("value", form.price)} class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition"></div><div><label for="price" class="block mb-2 text-sm font-medium text-gray-700"> % de Desconto: </label><input id="sale_price" type="number"${ssrRenderAttr("value", form.sale_price)} class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition"></div>`);
      if (form.sale_price >= 0 && form.price > 0) {
        _push(`<div><label for="price" class="block mb-2 text-md font-medium text-emerald-400"> Preço Final: ${ssrInterpolate(Discount())}€ </label></div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<div><label for="desc" class="block mb-2 text-sm font-medium text-gray-700"> Descrição: </label><input type="text" id="desc"${ssrRenderAttr("value", form.description)} class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition"></div><div><label for="category" class="block mb-2 text-sm font-medium text-gray-700"> Categoria do produto: </label><select class="w-full bg-gray-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out"><option disabled value=""${ssrIncludeBooleanAttr(Array.isArray(form.category_id) ? ssrLooseContain(form.category_id, "") : ssrLooseEqual(form.category_id, "")) ? " selected" : ""}>Selecione uma Categoria</option><!--[-->`);
      ssrRenderList(__props.categories, (category) => {
        _push(`<option${ssrRenderAttr("value", category.id)}${ssrIncludeBooleanAttr(Array.isArray(form.category_id) ? ssrLooseContain(form.category_id, category.id) : ssrLooseEqual(form.category_id, category.id)) ? " selected" : ""}>${ssrInterpolate(category.name)}</option>`);
      });
      _push(`<!--]--></select></div><div><label for="subCategory" class="block mb-2 text-sm font-medium text-gray-700"> Sub categoria do produto: </label><select class="w-full bg-gray-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out"><option disabled value=""${ssrIncludeBooleanAttr(Array.isArray(form.subcategory_id) ? ssrLooseContain(form.subcategory_id, "") : ssrLooseEqual(form.subcategory_id, "")) ? " selected" : ""}> Selecione uma Sub categoria </option><!--[-->`);
      ssrRenderList(__props.subcategories, (subCategory) => {
        _push(`<option${ssrRenderAttr("value", subCategory.id)}${ssrIncludeBooleanAttr(Array.isArray(form.subcategory_id) ? ssrLooseContain(form.subcategory_id, subCategory.id) : ssrLooseEqual(form.subcategory_id, subCategory.id)) ? " selected" : ""}>${ssrInterpolate(subCategory.name)}</option>`);
      });
      _push(`<!--]--></select></div><div><label for="stock" class="block mb-2 text-sm font-medium text-gray-700"> Stock do produto: </label><input id="stock" type="number"${ssrRenderAttr("value", form.stock)} class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition"></div><div><label for="image" class="block mb-2 text-sm font-medium text-gray-700"> Imagem do Produto: </label><input id="image" input type="file" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition"></div><button type="submit" class="w-full bg-gray-700 hover:bg-gray-900 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out"> Adicionar Produto </button></form></div><!--]-->`);
    };
  }
});
const _sfc_setup$A = _sfc_main$A.setup;
_sfc_main$A.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Admin/Products/addProduto.vue");
  return _sfc_setup$A ? _sfc_setup$A(props, ctx) : void 0;
};
const __vite_glob_0_4 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: _sfc_main$A
}, Symbol.toStringTag, { value: "Module" }));
const __default__$1 = {
  components: {
    navbar
  },
  props: {
    adminBtn: {
      type: Array,
      required: true
    },
    products: {
      type: Array,
      default: () => []
    },
    Utilizador: {
      type: Object,
      required: true
    }
  }
};
const _sfc_main$z = /* @__PURE__ */ Object.assign(__default__$1, {
  __name: "deleteProduto",
  __ssrInlineRender: true,
  setup(__props) {
    const form = reactive({
      id: null
    });
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[-->`);
      _push(ssrRenderComponent(navbar, {
        adminBtn: __props.adminBtn,
        Utilizador: __props.Utilizador
      }, null, _parent));
      _push(`<div class="max-w-2xl mx-auto p-6 mt-5"><h1 class="text-3xl font-bold mb-6 text-gray-800 text-center"> Eliminar Produtos </h1><form class="space-y-4"><div><div><label for="product" class="block mt-2 mb-2 text-sm font-medium text-gray-700">Qual é o Produto?</label><select class="w-full bg-gray-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out"><option disabled value=""${ssrIncludeBooleanAttr(Array.isArray(form.id) ? ssrLooseContain(form.id, "") : ssrLooseEqual(form.id, "")) ? " selected" : ""}>Selecione o produto</option><!--[-->`);
      ssrRenderList(__props.products, (item) => {
        _push(`<option${ssrRenderAttr("value", item.id)}${ssrIncludeBooleanAttr(Array.isArray(form.id) ? ssrLooseContain(form.id, item.id) : ssrLooseEqual(form.id, item.id)) ? " selected" : ""}>${ssrInterpolate(item.name)}</option>`);
      });
      _push(`<!--]--></select><button type="submit" class="mt-5 w-full bg-gray-700 hover:bg-gray-900 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out"> Eliminar Telemóvel </button></div></div></form></div><!--]-->`);
    };
  }
});
const _sfc_setup$z = _sfc_main$z.setup;
_sfc_main$z.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Admin/Products/deleteProduto.vue");
  return _sfc_setup$z ? _sfc_setup$z(props, ctx) : void 0;
};
const __vite_glob_0_5 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: _sfc_main$z
}, Symbol.toStringTag, { value: "Module" }));
const __default__ = {
  components: {
    Navbar: navbar
  },
  props: {
    adminBtn: {
      type: Array,
      required: true
    },
    product: {
      type: Array,
      required: true
    },
    Utilizador: {
      type: Object,
      required: true
    }
  }
};
const _sfc_main$y = /* @__PURE__ */ Object.assign(__default__, {
  __name: "updateProduto",
  __ssrInlineRender: true,
  setup(__props) {
    const form = reactive({
      id: null,
      price: "",
      stock: "",
      category_id: "",
      subcategory_id: ""
    });
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[-->`);
      _push(ssrRenderComponent(navbar, {
        adminBtn: __props.adminBtn,
        Utilizador: __props.Utilizador
      }, null, _parent));
      _push(`<div class="max-w-2xl mx-auto p-6 mt-5"><h1 class="text-3xl font-bold mb-6 text-gray-800 text-center"> Atualizar Produtos </h1><form class="space-y-4"><div><label for="product" class="block mb-2 text-sm font-medium text-gray-700">Qual é o produto?</label><select class="w-full bg-gray-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out"><option disabled value=""${ssrIncludeBooleanAttr(Array.isArray(form.id) ? ssrLooseContain(form.id, "") : ssrLooseEqual(form.id, "")) ? " selected" : ""}>Selecione o Produto</option><!--[-->`);
      ssrRenderList(__props.product, (item) => {
        _push(`<option${ssrRenderAttr("value", item.id)}${ssrIncludeBooleanAttr(Array.isArray(form.id) ? ssrLooseContain(form.id, item.id) : ssrLooseEqual(form.id, item.id)) ? " selected" : ""}>${ssrInterpolate(item.name)}</option>`);
      });
      _push(`<!--]--></select>`);
      if (form.id) {
        _push(`<label class="block mt-2 text-lg text-center font-medium text-emerald-400"> Preço atual: ${ssrInterpolate(__props.product.find((item) => item.id === form.id).price)}€ </label>`);
      } else {
        _push(`<!---->`);
      }
      if (form.id) {
        _push(`<label class="block text-lg text-center mt-2 text-md font-medium text-red-400">Stock atual: ${ssrInterpolate(__props.product.find((item) => item.id === form.id).stock)} Unidades</label>`);
      } else {
        _push(`<!---->`);
      }
      if (form.id) {
        _push(`<div class="mt-5"><label for="price" class="block mb-2 text-sm font-medium text-gray-700"> Novo Preço: </label><input id="price"${ssrRenderAttr("value", form.price)} type="number" step="0.01" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition"></div>`);
      } else {
        _push(`<!---->`);
      }
      if (form.id) {
        _push(`<div class="mt-5"><label for="stock" class="block mb-2 text-sm font-medium text-gray-700"> Adicionar Stock </label><input id="stock" type="number"${ssrRenderAttr("value", form.stock)} class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition"></div>`);
      } else {
        _push(`<!---->`);
      }
      if (form.price) {
        _push(`<div><label for="price" class="block mt-2 text-lg text-center font-medium text-emerald-400"> Preço final: ${ssrInterpolate(form.price)}€ </label></div>`);
      } else {
        _push(`<!---->`);
      }
      if (form.stock) {
        _push(`<div><label for="price" class="block mt-2 text-lg text-center font-medium text-red-400"> Stock final: ${ssrInterpolate(form.stock)} unidades </label></div>`);
      } else {
        _push(`<!---->`);
      }
      if (form.id && form.price && form.stock) {
        _push(`<button type="submit" class="mt-5 w-full bg-gray-700 hover:bg-gray-900 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out"> Atualizar Telemóvel </button>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></form></div><!--]-->`);
    };
  }
});
const _sfc_setup$y = _sfc_main$y.setup;
_sfc_main$y.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Admin/Products/updateProduto.vue");
  return _sfc_setup$y ? _sfc_setup$y(props, ctx) : void 0;
};
const __vite_glob_0_6 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: _sfc_main$y
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$x = {
  components: {
    Navbar: navbar,
    Pagination
  },
  props: {
    products: {
      type: [Array, Object],
      required: true
    },
    adminBtn: {
      type: Array,
      required: true
    },
    Utilizador: {
      type: Object,
      required: true
    },
    category: {
      type: Array,
      required: true
    },
    subcategory: {
      type: Array,
      required: true
    }
  },
  methods: {
    showCategories(category_id) {
      const category = this.category.find(
        (cate) => cate.id === category_id
      );
      return category.name;
    },
    showSubcategories(subcategory_id) {
      const subcategory = this.subcategory.find(
        (subcate) => subcate.id === subcategory_id
      );
      return subcategory.name;
    }
  }
};
function _sfc_ssrRender$v(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_Navbar = resolveComponent("Navbar");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<!--[-->`);
  _push(ssrRenderComponent(_component_Navbar, {
    adminBtn: $props.adminBtn,
    Utilizador: $props.Utilizador
  }, null, _parent));
  _push(`<div class="max-w-6xl mx-auto p-6 mt-5"><h1 class="text-3xl font-bold mb-6 text-gray-800 text-center"> Produtos </h1><div class="overflow-x-auto shadow-md sm:rounded-lg"><table class="w-full text-sm text-left text-gray-500"><thead class="text-xs text-white uppercase bg-blue-500"><tr><th scope="col" class="px-4 py-3 sm:px-6 sm:py-3"> Nome </th><th scope="col" class="px-4 py-3 sm:px-6 sm:py-3 sm:table-cell"> Preço </th><th scope="col" class="px-4 py-3 sm:px-6 sm:py-3 hidden md:table-cell"> Descrição </th><th scope="col" class="px-4 py-3 sm:px-6 sm:py-3"> Categoria </th><th scope="col" class="px-4 py-3 sm:px-6 sm:py-3 hidden lg:table-cell"> Subcategoria </th><th scope="col" class="px-4 py-3 sm:px-6 sm:py-3"> Stock </th><th scope="col" class="px-4 py-3 sm:px-6 sm:py-3"> Ações </th></tr></thead><tbody><!--[-->`);
  ssrRenderList($props.products.data, (product) => {
    _push(`<tr class="bg-white border-b hover:bg-gray-50"><td class="px-4 py-4 font-medium text-gray-900 whitespace-nowrap">${ssrInterpolate(product.name)}</td><td class="px-4 py-4 sm:table-cell">${ssrInterpolate(product.price)}€ </td><td class="px-4 py-4 hidden md:table-cell truncate max-w-[150px]">${ssrInterpolate(product.description)}</td><td class="px-4 py-4">${ssrInterpolate($options.showCategories(product.category_id))}</td><td class="px-4 py-4 hidden lg:table-cell">${ssrInterpolate($options.showSubcategories(product.subcategory_id))}</td>`);
    if (product.stock <= 0) {
      _push(`<td class="px-4 py-4 text-red-600">${ssrInterpolate(product.stock)}</td>`);
    } else if (product.stock <= 10) {
      _push(`<td class="text-yellow-400">${ssrInterpolate(product.stock)}</td>`);
    } else {
      _push(`<td class="text-emerald-500">${ssrInterpolate(product.stock)}</td>`);
    }
    _push(`<td class="px-4 py-4 space-x-2 whitespace-nowrap"><button class="bg-emerald-500 hover:bg-emerald-600 text-white p-2 rounded-lg text-sm"><span class="hidden sm:inline">Atualizar</span><svg class="w-5 h-5 sm:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg></button><button class="bg-red-600 hover:bg-red-700 text-white p-2 rounded-lg text-sm"><span class="hidden sm:inline">Eliminar</span><svg class="w-5 h-5 sm:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button></td></tr>`);
  });
  _push(`<!--]--></tbody></table></div>`);
  _push(ssrRenderComponent(_component_Pagination, {
    links: $props.products.links
  }, null, _parent));
  _push(`</div><!--]-->`);
}
const _sfc_setup$x = _sfc_main$x.setup;
_sfc_main$x.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Admin/Products/viewProducts.vue");
  return _sfc_setup$x ? _sfc_setup$x(props, ctx) : void 0;
};
const viewProducts = /* @__PURE__ */ _export_sfc(_sfc_main$x, [["ssrRender", _sfc_ssrRender$v]]);
const __vite_glob_0_7 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: viewProducts
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$w = {
  components: {
    navbar
  },
  props: {
    adminBtn: {
      type: Array,
      required: true
    },
    Utilizador: {
      type: Object,
      required: true
    }
  }
};
function _sfc_ssrRender$u(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_navbar = resolveComponent("navbar");
  _push(ssrRenderComponent(_component_navbar, mergeProps({
    adminBtn: $props.adminBtn,
    Utilizador: $props.Utilizador
  }, _attrs), null, _parent));
}
const _sfc_setup$w = _sfc_main$w.setup;
_sfc_main$w.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Admin/adminPage.vue");
  return _sfc_setup$w ? _sfc_setup$w(props, ctx) : void 0;
};
const adminPage = /* @__PURE__ */ _export_sfc(_sfc_main$w, [["ssrRender", _sfc_ssrRender$u]]);
const __vite_glob_0_8 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: adminPage
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$v = {
  components: {
    Navbar,
    Product: Product$1,
    Pagination,
    FilterSideBar: _sfc_main$D
  },
  props: {
    products: {
      type: [Array, Object],
      required: true
    },
    category: {
      type: Array,
      required: true
    },
    subcategory: {
      type: Array,
      required: true
    },
    Utilizador: {
      type: Object
    },
    buttons: {
      type: Array,
      required: true
    },
    isAdmin: {
      type: Boolean
    },
    armazenamento: {
      type: Array,
      required: true
    },
    manufacturer: {
      type: Array,
      required: true
    }
  },
  setup() {
    const { t } = useI18n();
    return { t };
  }
};
function _sfc_ssrRender$t(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_Navbar = resolveComponent("Navbar");
  const _component_FilterSideBar = resolveComponent("FilterSideBar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_Navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800">${ssrInterpolate($setup.t("components-storage-title"))}</h1><div class="flex gap-5 px-8"><div class="w-1/4">`);
  _push(ssrRenderComponent(_component_FilterSideBar, {
    manufacturer: $props.manufacturer,
    products: $props.products.data,
    armazenamento: $props.armazenamento
  }, null, _parent));
  _push(`</div><div class="w-3/4">`);
  _push(ssrRenderComponent(_component_Product, {
    products: $props.products.data,
    category: $props.category,
    subcategory: $props.subcategory,
    manufacturer: $props.manufacturer
  }, null, _parent));
  _push(ssrRenderComponent(_component_Pagination, {
    links: $props.products.links
  }, null, _parent));
  _push(`</div></div></div>`);
}
const _sfc_setup$v = _sfc_main$v.setup;
_sfc_main$v.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/ComponentesPC/armazenamentoPage.vue");
  return _sfc_setup$v ? _sfc_setup$v(props, ctx) : void 0;
};
const armazenamentoPage = /* @__PURE__ */ _export_sfc(_sfc_main$v, [["ssrRender", _sfc_ssrRender$t]]);
const __vite_glob_0_9 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: armazenamentoPage
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$u = {
  components: {
    navbar: Navbar,
    Product: Product$1,
    Pagination,
    FilterSideBar: _sfc_main$D
  },
  props: {
    products: {
      type: [Array, Object],
      default: () => []
    },
    Utilizador: {
      type: Object
    },
    buttons: {
      type: Array,
      required: true
    },
    isAdmin: {
      type: Boolean
    },
    category: {
      type: Array,
      required: true
    },
    subcategory: {
      type: Array,
      required: true
    },
    manufacturer: {
      type: Array,
      required: true
    },
    PCcases: {
      type: Array,
      default: () => []
    }
  },
  setup() {
    const { t } = useI18n();
    return { t };
  }
};
function _sfc_ssrRender$s(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_navbar = resolveComponent("navbar");
  const _component_FilterSideBar = resolveComponent("FilterSideBar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800">${ssrInterpolate($setup.t("components-cases-title"))}</h1><div class="flex gap-5 px-8"><div class="w-1/4">`);
  _push(ssrRenderComponent(_component_FilterSideBar, {
    manufacturer: $props.manufacturer,
    products: $props.products.data,
    PCcases: $props.PCcases
  }, null, _parent));
  _push(`</div><div class="w-3/4">`);
  _push(ssrRenderComponent(_component_Product, {
    products: $props.products.data,
    category: $props.category,
    subcategory: $props.subcategory,
    manufacturer: $props.manufacturer
  }, null, _parent));
  _push(ssrRenderComponent(_component_Pagination, {
    links: $props.products.links
  }, null, _parent));
  _push(`</div></div></div>`);
}
const _sfc_setup$u = _sfc_main$u.setup;
_sfc_main$u.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/ComponentesPC/caixasPcPage.vue");
  return _sfc_setup$u ? _sfc_setup$u(props, ctx) : void 0;
};
const caixasPcPage = /* @__PURE__ */ _export_sfc(_sfc_main$u, [["ssrRender", _sfc_ssrRender$s]]);
const __vite_glob_0_10 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: caixasPcPage
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$t = {
  components: {
    navbar: Navbar,
    Product: Product$1,
    Pagination,
    FilterSideBar: _sfc_main$D
  },
  props: {
    products: {
      type: [Array, Object],
      default: () => []
    },
    Utilizador: {
      type: Object
    },
    buttons: {
      type: Array,
      required: true
    },
    isAdmin: {
      type: Boolean
    },
    category: {
      type: Array,
      required: true
    },
    subcategory: {
      type: Array,
      required: true
    },
    manufacturer: {
      type: Array,
      required: true
    },
    ram: {
      type: Array,
      default: () => []
    },
    armazenamento: {
      type: Array,
      default: () => []
    },
    cpu: {
      type: Array,
      default: () => []
    },
    gpu: {
      type: Array,
      default: () => []
    },
    motherboard: {
      type: Array,
      default: () => []
    },
    powersupply: {
      type: Array,
      default: () => []
    },
    cpuCooler: {
      type: Array,
      default: () => []
    },
    PCcase: {
      type: Array,
      default: () => []
    }
  },
  setup() {
    const { t } = useI18n();
    return { t };
  }
};
function _sfc_ssrRender$r(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_navbar = resolveComponent("navbar");
  const _component_FilterSideBar = resolveComponent("FilterSideBar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800">${ssrInterpolate($setup.t("components-page-title"))}</h1><div class="flex gap-5 px-8"><div class="w-1/4">`);
  _push(ssrRenderComponent(_component_FilterSideBar, {
    manufacturer: $props.manufacturer,
    products: $props.products.data,
    subcategory: $props.subcategory,
    ram: $props.ram,
    cpu: $props.cpu,
    armazenamento: $props.armazenamento,
    motherboard: $props.motherboard,
    gpu: $props.gpu,
    powersupply: $props.powersupply,
    cpuCooler: $props.cpuCooler,
    PCcases: $props.PCcase
  }, null, _parent));
  _push(`</div><div class="w-3/4">`);
  _push(ssrRenderComponent(_component_Product, {
    products: $props.products.data,
    category: $props.category,
    subcategory: $props.subcategory,
    manufacturer: $props.manufacturer
  }, null, _parent));
  _push(ssrRenderComponent(_component_Pagination, {
    links: $props.products.links
  }, null, _parent));
  _push(`</div></div></div>`);
}
const _sfc_setup$t = _sfc_main$t.setup;
_sfc_main$t.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/ComponentesPC/componentePcPage.vue");
  return _sfc_setup$t ? _sfc_setup$t(props, ctx) : void 0;
};
const componentePcPage = /* @__PURE__ */ _export_sfc(_sfc_main$t, [["ssrRender", _sfc_ssrRender$r]]);
const __vite_glob_0_11 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: componentePcPage
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$s = {
  components: {
    navbar: Navbar,
    Product: Product$1,
    Pagination,
    FilterSideBar: _sfc_main$D
  },
  props: {
    products: {
      type: [Array, Object],
      default: () => []
    },
    Utilizador: {
      type: Object
    },
    buttons: {
      type: Array,
      required: true
    },
    isAdmin: {
      type: Boolean
    },
    category: {
      type: Array,
      required: true
    },
    subcategory: {
      type: Array,
      required: true
    },
    manufacturer: {
      type: Array,
      required: true
    },
    cpuCooler: {
      type: Array,
      default: () => []
    }
  },
  setup() {
    const { t } = useI18n();
    return { t };
  }
};
function _sfc_ssrRender$q(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_navbar = resolveComponent("navbar");
  const _component_FilterSideBar = resolveComponent("FilterSideBar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800">${ssrInterpolate($setup.t("components-cpu-coolers-title"))}</h1><div class="flex gap-5 px-8"><div class="w-1/4">`);
  _push(ssrRenderComponent(_component_FilterSideBar, {
    manufacturer: $props.manufacturer,
    products: $props.products.data,
    cpuCooler: $props.cpuCooler
  }, null, _parent));
  _push(`</div><div class="w-3/4">`);
  _push(ssrRenderComponent(_component_Product, {
    products: $props.products.data,
    category: $props.category,
    subcategory: $props.subcategory,
    manufacturer: $props.manufacturer
  }, null, _parent));
  _push(ssrRenderComponent(_component_Pagination, {
    links: $props.products.links
  }, null, _parent));
  _push(`</div></div></div>`);
}
const _sfc_setup$s = _sfc_main$s.setup;
_sfc_main$s.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/ComponentesPC/cpu-coolPage.vue");
  return _sfc_setup$s ? _sfc_setup$s(props, ctx) : void 0;
};
const cpuCoolPage = /* @__PURE__ */ _export_sfc(_sfc_main$s, [["ssrRender", _sfc_ssrRender$q]]);
const __vite_glob_0_12 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: cpuCoolPage
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$r = {
  components: {
    navbar: Navbar,
    Product: Product$1,
    Pagination,
    FilterSideBar: _sfc_main$D
  },
  props: {
    products: {
      type: [Array, Object],
      default: () => []
    },
    Utilizador: {
      type: Object
    },
    buttons: {
      type: Array,
      required: true
    },
    isAdmin: {
      type: Boolean
    },
    category: {
      type: Array,
      required: true
    },
    subcategory: {
      type: Array,
      required: true
    },
    manufacturer: {
      type: Array,
      required: true
    },
    cpu: {
      type: Array,
      default: () => []
    }
  },
  setup() {
    const { t } = useI18n();
    return { t };
  }
};
function _sfc_ssrRender$p(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_navbar = resolveComponent("navbar");
  const _component_FilterSideBar = resolveComponent("FilterSideBar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800">${ssrInterpolate($setup.t("components-processor-title"))}</h1><div class="flex gap-5 px-8"><div class="w-1/4">`);
  _push(ssrRenderComponent(_component_FilterSideBar, {
    manufacturer: $props.manufacturer,
    products: $props.products.data,
    cpu: $props.cpu
  }, null, _parent));
  _push(`</div><div class="w-3/4">`);
  _push(ssrRenderComponent(_component_Product, {
    products: $props.products.data,
    category: $props.category,
    subcategory: $props.subcategory,
    manufacturer: $props.manufacturer
  }, null, _parent));
  _push(ssrRenderComponent(_component_Pagination, {
    links: $props.products.links
  }, null, _parent));
  _push(`</div></div></div>`);
}
const _sfc_setup$r = _sfc_main$r.setup;
_sfc_main$r.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/ComponentesPC/cpuPage.vue");
  return _sfc_setup$r ? _sfc_setup$r(props, ctx) : void 0;
};
const cpuPage = /* @__PURE__ */ _export_sfc(_sfc_main$r, [["ssrRender", _sfc_ssrRender$p]]);
const __vite_glob_0_13 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: cpuPage
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$q = {
  components: {
    navbar: Navbar,
    Product: Product$1,
    Pagination,
    FilterSideBar: _sfc_main$D
  },
  props: {
    products: {
      type: [Array, Object],
      default: () => []
    },
    Utilizador: {
      type: Object
    },
    buttons: {
      type: Array,
      required: true
    },
    isAdmin: {
      type: Boolean
    },
    category: {
      type: Array,
      required: true
    },
    subcategory: {
      type: Array,
      required: true
    },
    manufacturer: {
      type: Array,
      required: true
    },
    powersupply: {
      type: Array,
      required: true
    }
  },
  setup() {
    const { t } = useI18n();
    return { t };
  }
};
function _sfc_ssrRender$o(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_navbar = resolveComponent("navbar");
  const _component_FilterSideBar = resolveComponent("FilterSideBar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800">${ssrInterpolate($setup.t("components-psu-title"))}</h1><div class="flex gap-5 px-8"><div class="w-1/4">`);
  _push(ssrRenderComponent(_component_FilterSideBar, {
    manufacturer: $props.manufacturer,
    products: $props.products.data,
    powersupply: $props.powersupply
  }, null, _parent));
  _push(`</div><div class="w-3/4">`);
  _push(ssrRenderComponent(_component_Product, {
    products: $props.products.data,
    category: $props.category,
    subcategory: $props.subcategory,
    manufacturer: $props.manufacturer
  }, null, _parent));
  _push(ssrRenderComponent(_component_Pagination, {
    links: $props.products.links
  }, null, _parent));
  _push(`</div></div></div>`);
}
const _sfc_setup$q = _sfc_main$q.setup;
_sfc_main$q.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/ComponentesPC/fontePage.vue");
  return _sfc_setup$q ? _sfc_setup$q(props, ctx) : void 0;
};
const fontePage = /* @__PURE__ */ _export_sfc(_sfc_main$q, [["ssrRender", _sfc_ssrRender$o]]);
const __vite_glob_0_14 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: fontePage
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$p = {
  components: {
    navbar: Navbar,
    Product: Product$1,
    Pagination,
    FilterSideBar: _sfc_main$D
  },
  props: {
    products: {
      type: [Array, Object],
      default: () => []
    },
    Utilizador: {
      type: Object
    },
    buttons: {
      type: Array,
      required: true
    },
    isAdmin: {
      type: Boolean
    },
    category: {
      type: Array,
      required: true
    },
    subcategory: {
      type: Array,
      required: true
    },
    manufacturer: {
      type: Array,
      required: true
    },
    gpu: {
      type: Array,
      default: () => []
    }
  },
  setup() {
    const { t } = useI18n();
    return { t };
  }
};
function _sfc_ssrRender$n(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_navbar = resolveComponent("navbar");
  const _component_FilterSideBar = resolveComponent("FilterSideBar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800">${ssrInterpolate($setup.t("components-gpu-title"))}</h1><div class="flex gap-5 px-8"><div class="w-1/4">`);
  _push(ssrRenderComponent(_component_FilterSideBar, {
    manufacturer: $props.manufacturer,
    products: $props.products.data,
    gpu: $props.gpu
  }, null, _parent));
  _push(`</div><div class="w-3/4">`);
  _push(ssrRenderComponent(_component_Product, {
    products: $props.products.data,
    category: $props.category,
    subcategory: $props.subcategory,
    manufacturer: $props.manufacturer
  }, null, _parent));
  _push(ssrRenderComponent(_component_Pagination, {
    links: $props.products.links
  }, null, _parent));
  _push(`</div></div></div>`);
}
const _sfc_setup$p = _sfc_main$p.setup;
_sfc_main$p.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/ComponentesPC/gpuPage.vue");
  return _sfc_setup$p ? _sfc_setup$p(props, ctx) : void 0;
};
const gpuPage = /* @__PURE__ */ _export_sfc(_sfc_main$p, [["ssrRender", _sfc_ssrRender$n]]);
const __vite_glob_0_15 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: gpuPage
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$o = {
  components: {
    navbar: Navbar,
    Product: Product$1,
    Pagination,
    FilterSideBar: _sfc_main$D
  },
  props: {
    products: {
      type: [Array, Object],
      default: () => []
    },
    Utilizador: {
      type: Object
    },
    buttons: {
      type: Array,
      required: true
    },
    isAdmin: {
      type: Boolean
    },
    category: {
      type: Array,
      required: true
    },
    subcategory: {
      type: Array,
      required: true
    },
    manufacturer: {
      type: Array,
      required: true
    },
    motherboard: {
      type: Array,
      default: () => []
    }
  },
  setup() {
    const { t } = useI18n();
    return { t };
  }
};
function _sfc_ssrRender$m(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_navbar = resolveComponent("navbar");
  const _component_FilterSideBar = resolveComponent("FilterSideBar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800">${ssrInterpolate($setup.t("components-motherboards-title"))}</h1><div class="flex gap-5 px-8"><div class="w-1/4">`);
  _push(ssrRenderComponent(_component_FilterSideBar, {
    manufacturer: $props.manufacturer,
    products: $props.products.data,
    motherboard: $props.motherboard
  }, null, _parent));
  _push(`</div><div class="w-3/4">`);
  _push(ssrRenderComponent(_component_Product, {
    products: $props.products.data,
    category: $props.category,
    subcategory: $props.subcategory,
    manufacturer: $props.manufacturer
  }, null, _parent));
  _push(ssrRenderComponent(_component_Pagination, {
    links: $props.products.links
  }, null, _parent));
  _push(`</div></div></div>`);
}
const _sfc_setup$o = _sfc_main$o.setup;
_sfc_main$o.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/ComponentesPC/motherboardsPage.vue");
  return _sfc_setup$o ? _sfc_setup$o(props, ctx) : void 0;
};
const motherboardsPage = /* @__PURE__ */ _export_sfc(_sfc_main$o, [["ssrRender", _sfc_ssrRender$m]]);
const __vite_glob_0_16 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: motherboardsPage
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$n = {
  components: {
    navbar: Navbar,
    Product: Product$1,
    Pagination,
    FilterSideBar: _sfc_main$D
  },
  props: {
    products: {
      type: [Array, Object],
      default: () => []
    },
    Utilizador: {
      type: Object
    },
    buttons: {
      type: Array,
      required: true
    },
    isAdmin: {
      type: Boolean
    },
    category: {
      type: Array,
      required: true
    },
    subcategory: {
      type: Array,
      required: true
    },
    manufacturer: {
      type: Array,
      required: true
    },
    ram: {
      type: Array,
      default: () => []
    }
  },
  setup() {
    const { t } = useI18n();
    return { t };
  }
};
function _sfc_ssrRender$l(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_navbar = resolveComponent("navbar");
  const _component_FilterSideBar = resolveComponent("FilterSideBar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800">${ssrInterpolate($setup.t("components-memory-ram-title"))}</h1><div class="flex gap-5 px-8"><div class="w-1/4">`);
  _push(ssrRenderComponent(_component_FilterSideBar, {
    manufacturer: $props.manufacturer,
    products: $props.products.data,
    ram: $props.ram
  }, null, _parent));
  _push(`</div><div class="w-3/4">`);
  _push(ssrRenderComponent(_component_Product, {
    products: $props.products.data,
    category: $props.category,
    subcategory: $props.subcategory,
    manufacturer: $props.manufacturer
  }, null, _parent));
  _push(`</div></div>`);
  _push(ssrRenderComponent(_component_Pagination, {
    links: $props.products.links
  }, null, _parent));
  _push(`</div>`);
}
const _sfc_setup$n = _sfc_main$n.setup;
_sfc_main$n.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/ComponentesPC/ramPage.vue");
  return _sfc_setup$n ? _sfc_setup$n(props, ctx) : void 0;
};
const ramPage = /* @__PURE__ */ _export_sfc(_sfc_main$n, [["ssrRender", _sfc_ssrRender$l]]);
const __vite_glob_0_17 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: ramPage
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$m = {
  components: {
    Navbar,
    Product: Product$1,
    Pagination
  },
  props: {
    products: {
      type: Array,
      required: true
    },
    category: {
      type: Array,
      required: true
    },
    subcategory: {
      type: Array,
      required: true
    },
    Utilizador: {
      type: Object
    },
    buttons: {
      type: Array,
      required: true
    },
    isAdmin: {
      type: Boolean
    }
  }
};
function _sfc_ssrRender$k(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_Navbar = resolveComponent("Navbar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_Navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"> Computadores Desktop </h1>`);
  _push(ssrRenderComponent(_component_Product, {
    products: $props.products.data,
    category: $props.category,
    subcategory: $props.subcategory
  }, null, _parent));
  _push(ssrRenderComponent(_component_Pagination, {
    links: $props.products.links
  }, null, _parent));
  _push(`</div>`);
}
const _sfc_setup$m = _sfc_main$m.setup;
_sfc_main$m.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Computadores/DesktopPage.vue");
  return _sfc_setup$m ? _sfc_setup$m(props, ctx) : void 0;
};
const DesktopPage = /* @__PURE__ */ _export_sfc(_sfc_main$m, [["ssrRender", _sfc_ssrRender$k]]);
const __vite_glob_0_18 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: DesktopPage
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$l = {
  components: {
    Navbar,
    Product: Product$1,
    Pagination
  },
  props: {
    products: {
      type: [Array, Object],
      required: true
    },
    category: {
      type: Array,
      required: true
    },
    subcategory: {
      type: Array,
      required: true
    },
    Utilizador: {
      type: Object
    },
    buttons: {
      type: Array,
      required: true
    },
    isAdmin: {
      type: Boolean
    }
  }
};
function _sfc_ssrRender$j(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_Navbar = resolveComponent("Navbar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_Navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"> Computadores Gaming MaRca </h1>`);
  _push(ssrRenderComponent(_component_Product, {
    products: $props.products.data,
    category: $props.category,
    subcategory: $props.subcategory
  }, null, _parent));
  _push(ssrRenderComponent(_component_Pagination, {
    links: $props.products.links
  }, null, _parent));
  _push(`</div>`);
}
const _sfc_setup$l = _sfc_main$l.setup;
_sfc_main$l.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Computadores/GamingPage.vue");
  return _sfc_setup$l ? _sfc_setup$l(props, ctx) : void 0;
};
const GamingPage = /* @__PURE__ */ _export_sfc(_sfc_main$l, [["ssrRender", _sfc_ssrRender$j]]);
const __vite_glob_0_19 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: GamingPage
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$k = {
  components: {
    Navbar,
    Product: Product$1,
    Pagination
  },
  props: {
    products: {
      type: Array,
      required: true
    },
    category: {
      type: Array,
      required: true
    },
    subcategory: {
      type: Array,
      required: true
    },
    Utilizador: {
      type: Object
    },
    buttons: {
      type: Array,
      required: true
    },
    isAdmin: {
      type: Boolean
    }
  }
};
function _sfc_ssrRender$i(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_Navbar = resolveComponent("Navbar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_Navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"> Computadores Laptop </h1>`);
  _push(ssrRenderComponent(_component_Product, {
    products: $props.products.data,
    category: $props.category,
    subcategory: $props.subcategory
  }, null, _parent));
  _push(ssrRenderComponent(_component_Pagination, {
    links: $props.products.links
  }, null, _parent));
  _push(`</div>`);
}
const _sfc_setup$k = _sfc_main$k.setup;
_sfc_main$k.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Computadores/LaptopPage.vue");
  return _sfc_setup$k ? _sfc_setup$k(props, ctx) : void 0;
};
const LaptopPage = /* @__PURE__ */ _export_sfc(_sfc_main$k, [["ssrRender", _sfc_ssrRender$i]]);
const __vite_glob_0_20 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: LaptopPage
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$j = {
  components: {
    Navbar,
    Product: Product$1,
    Pagination
  },
  props: {
    products: {
      type: Array,
      required: true
    },
    category: {
      type: Array,
      required: true
    },
    subcategory: {
      type: Array,
      required: true
    },
    Utilizador: {
      type: Object
    },
    buttons: {
      type: Array,
      required: true
    },
    isAdmin: {
      type: Boolean
    }
  }
};
function _sfc_ssrRender$h(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_Navbar = resolveComponent("Navbar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_Navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"> Microcomputadores </h1>`);
  _push(ssrRenderComponent(_component_Product, {
    products: $props.products.data,
    category: $props.category,
    subcategory: $props.subcategory
  }, null, _parent));
  _push(ssrRenderComponent(_component_Pagination, {
    links: $props.products.links
  }, null, _parent));
  _push(`</div>`);
}
const _sfc_setup$j = _sfc_main$j.setup;
_sfc_main$j.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Computadores/MicroPcPage.vue");
  return _sfc_setup$j ? _sfc_setup$j(props, ctx) : void 0;
};
const MicroPcPage = /* @__PURE__ */ _export_sfc(_sfc_main$j, [["ssrRender", _sfc_ssrRender$h]]);
const __vite_glob_0_21 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: MicroPcPage
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$i = {
  components: {
    navbar: Navbar,
    Product: Product$1,
    Pagination,
    FilterSideBar: _sfc_main$D
  },
  props: {
    products: {
      type: [Array, Object],
      default: () => []
    },
    Utilizador: {
      type: Object
    },
    buttons: {
      type: Array,
      required: true
    },
    isAdmin: {
      type: Boolean
    },
    category: {
      type: Array,
      required: true
    },
    subcategory: {
      type: Array,
      required: true
    },
    manufacturer: {
      type: Array,
      required: true
    }
  }
};
function _sfc_ssrRender$g(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_navbar = resolveComponent("navbar");
  const _component_FilterSideBar = resolveComponent("FilterSideBar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"> Computadores MaRca </h1><div class="flex gap-5 px-8"><div class="w-1/4">`);
  _push(ssrRenderComponent(_component_FilterSideBar, {
    manufacturer: $props.manufacturer,
    products: $props.products.data,
    category: $props.category,
    subcategory: $props.subcategory
  }, null, _parent));
  _push(`</div><div class="w-3/4">`);
  _push(ssrRenderComponent(_component_Product, {
    products: $props.products.data,
    category: $props.category,
    subcategory: $props.subcategory,
    manufacturer: $props.manufacturer
  }, null, _parent));
  _push(ssrRenderComponent(_component_Pagination, {
    links: $props.products.links
  }, null, _parent));
  _push(`</div></div></div>`);
}
const _sfc_setup$i = _sfc_main$i.setup;
_sfc_main$i.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Computadores/computadoresPage.vue");
  return _sfc_setup$i ? _sfc_setup$i(props, ctx) : void 0;
};
const computadoresPage = /* @__PURE__ */ _export_sfc(_sfc_main$i, [["ssrRender", _sfc_ssrRender$g]]);
const __vite_glob_0_22 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: computadoresPage
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$h = {
  components: {
    Navbar,
    Product: Product$1,
    Pagination
  },
  props: {
    products: {
      type: [Array, Object],
      required: true
    },
    category: {
      type: Array,
      required: true
    },
    subcategory: {
      type: Array,
      required: true
    },
    Utilizador: {
      type: Object
    },
    buttons: {
      type: Array,
      required: true
    },
    isAdmin: {
      type: Boolean
    }
  }
};
function _sfc_ssrRender$f(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_Navbar = resolveComponent("Navbar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_Navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"> Computadores Workstation </h1>`);
  _push(ssrRenderComponent(_component_Product, {
    products: $props.products.data,
    category: $props.category,
    subcategory: $props.subcategory
  }, null, _parent));
  _push(ssrRenderComponent(_component_Pagination, {
    links: $props.products.links
  }, null, _parent));
  _push(`</div>`);
}
const _sfc_setup$h = _sfc_main$h.setup;
_sfc_main$h.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Computadores/workstationPage.vue");
  return _sfc_setup$h ? _sfc_setup$h(props, ctx) : void 0;
};
const workstationPage = /* @__PURE__ */ _export_sfc(_sfc_main$h, [["ssrRender", _sfc_ssrRender$f]]);
const __vite_glob_0_23 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: workstationPage
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$g = {
  components: {
    Navbar,
    Product: Product$1,
    Pagination
  },
  props: {
    products: {
      type: [Array, Object],
      required: true
    },
    category: {
      type: Array,
      required: true
    },
    subcategory: {
      type: Array,
      required: true
    },
    Utilizador: {
      type: Object
    },
    buttons: {
      type: Array,
      required: true
    },
    isAdmin: {
      type: Boolean
    }
  }
};
function _sfc_ssrRender$e(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_Navbar = resolveComponent("Navbar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_Navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"> Monitores </h1>`);
  _push(ssrRenderComponent(_component_Product, {
    products: $props.products.data,
    category: $props.category,
    subcategory: $props.subcategory
  }, null, _parent));
  _push(ssrRenderComponent(_component_Pagination, {
    links: $props.products.links
  }, null, _parent));
  _push(`</div>`);
}
const _sfc_setup$g = _sfc_main$g.setup;
_sfc_main$g.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Perifericos/MonitorPage.vue");
  return _sfc_setup$g ? _sfc_setup$g(props, ctx) : void 0;
};
const MonitorPage = /* @__PURE__ */ _export_sfc(_sfc_main$g, [["ssrRender", _sfc_ssrRender$e]]);
const __vite_glob_0_24 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: MonitorPage
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$f = {
  components: {
    Navbar,
    Product: Product$1,
    Pagination
  },
  props: {
    products: {
      type: [Array, Object],
      required: true
    },
    category: {
      type: Array,
      required: true
    },
    subcategory: {
      type: Array,
      required: true
    },
    Utilizador: {
      type: Object
    },
    buttons: {
      type: Array,
      required: true
    },
    isAdmin: {
      type: Boolean
    }
  }
};
function _sfc_ssrRender$d(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_Navbar = resolveComponent("Navbar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_Navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"> Audio </h1>`);
  _push(ssrRenderComponent(_component_Product, {
    products: $props.products.data,
    category: $props.category,
    subcategory: $props.subcategory
  }, null, _parent));
  _push(ssrRenderComponent(_component_Pagination, {
    links: $props.products.links
  }, null, _parent));
  _push(`</div>`);
}
const _sfc_setup$f = _sfc_main$f.setup;
_sfc_main$f.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Perifericos/PCAudioPage.vue");
  return _sfc_setup$f ? _sfc_setup$f(props, ctx) : void 0;
};
const PCAudioPage = /* @__PURE__ */ _export_sfc(_sfc_main$f, [["ssrRender", _sfc_ssrRender$d]]);
const __vite_glob_0_25 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: PCAudioPage
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$e = {
  components: {
    Navbar,
    Product: Product$1,
    Pagination
  },
  props: {
    products: {
      type: [Array, Object],
      required: true
    },
    category: {
      type: Array,
      required: true
    },
    subcategory: {
      type: Array,
      required: true
    },
    Utilizador: {
      type: Object
    },
    buttons: {
      type: Array,
      required: true
    },
    isAdmin: {
      type: Boolean
    }
  }
};
function _sfc_ssrRender$c(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_Navbar = resolveComponent("Navbar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_Navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"> Ratos &amp; Teclados </h1>`);
  _push(ssrRenderComponent(_component_Product, {
    products: $props.products.data,
    category: $props.category,
    subcategory: $props.subcategory
  }, null, _parent));
  _push(ssrRenderComponent(_component_Pagination, {
    links: $props.products.links
  }, null, _parent));
  _push(`</div>`);
}
const _sfc_setup$e = _sfc_main$e.setup;
_sfc_main$e.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Perifericos/RatoTecladoPage.vue");
  return _sfc_setup$e ? _sfc_setup$e(props, ctx) : void 0;
};
const RatoTecladoPage = /* @__PURE__ */ _export_sfc(_sfc_main$e, [["ssrRender", _sfc_ssrRender$c]]);
const __vite_glob_0_26 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: RatoTecladoPage
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$d = {
  components: {
    Navbar,
    Product: Product$1,
    Pagination
  },
  props: {
    products: {
      type: [Array, Object],
      required: true
    },
    category: {
      type: Array,
      required: true
    },
    subcategory: {
      type: Array,
      required: true
    },
    Utilizador: {
      type: Object
    },
    buttons: {
      type: Array,
      required: true
    },
    isAdmin: {
      type: Boolean
    }
  }
};
function _sfc_ssrRender$b(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_Navbar = resolveComponent("Navbar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_Navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"> Video </h1>`);
  _push(ssrRenderComponent(_component_Product, {
    products: $props.products.data,
    category: $props.category,
    subcategory: $props.subcategory
  }, null, _parent));
  _push(ssrRenderComponent(_component_Pagination, {
    links: $props.products.links
  }, null, _parent));
  _push(`</div>`);
}
const _sfc_setup$d = _sfc_main$d.setup;
_sfc_main$d.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Perifericos/VideoPage.vue");
  return _sfc_setup$d ? _sfc_setup$d(props, ctx) : void 0;
};
const VideoPage = /* @__PURE__ */ _export_sfc(_sfc_main$d, [["ssrRender", _sfc_ssrRender$b]]);
const __vite_glob_0_27 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: VideoPage
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$c = {
  components: {
    navbar: Navbar,
    Product: Product$1,
    Pagination,
    FilterSideBar: _sfc_main$D
  },
  props: {
    products: {
      type: [Array, Object],
      default: () => []
    },
    Utilizador: {
      type: Object
    },
    buttons: {
      type: Array,
      required: true
    },
    isAdmin: {
      type: Boolean
    },
    category: {
      type: Array,
      required: true
    },
    subcategory: {
      type: Array,
      required: true
    },
    manufacturer: {
      type: Array,
      required: true
    }
  }
};
function _sfc_ssrRender$a(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_navbar = resolveComponent("navbar");
  const _component_FilterSideBar = resolveComponent("FilterSideBar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"> Periféricos </h1><div class="flex gap-5 px-8"><div class="w-1/4">`);
  _push(ssrRenderComponent(_component_FilterSideBar, {
    manufacturer: $props.manufacturer,
    products: $props.products.data,
    category: $props.category,
    subcategory: $props.subcategory
  }, null, _parent));
  _push(`</div><div class="w-3/4">`);
  _push(ssrRenderComponent(_component_Product, {
    products: $props.products.data,
    category: $props.category,
    subcategory: $props.subcategory,
    manufacturer: $props.manufacturer
  }, null, _parent));
  _push(ssrRenderComponent(_component_Pagination, {
    links: $props.products.links
  }, null, _parent));
  _push(`</div></div></div>`);
}
const _sfc_setup$c = _sfc_main$c.setup;
_sfc_main$c.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Perifericos/perifericosPage.vue");
  return _sfc_setup$c ? _sfc_setup$c(props, ctx) : void 0;
};
const perifericosPage = /* @__PURE__ */ _export_sfc(_sfc_main$c, [["ssrRender", _sfc_ssrRender$a]]);
const __vite_glob_0_28 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: perifericosPage
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$b = {
  components: {
    navbar: Navbar,
    Product: Product$1,
    Pagination,
    FilterSideBar: _sfc_main$D
  },
  props: {
    products: {
      type: [Array, Object],
      default: () => []
    },
    Utilizador: {
      type: Object
    },
    buttons: {
      type: Array,
      required: true
    },
    isAdmin: {
      type: Boolean
    },
    category: {
      type: Array,
      required: true
    },
    subcategory: {
      type: Array,
      required: true
    },
    manufacturer: {
      type: Array,
      required: true
    },
    smartphone: {
      type: Array,
      default: () => []
    }
  },
  setup() {
    const { t } = useI18n();
    return { t };
  }
};
function _sfc_ssrRender$9(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_navbar = resolveComponent("navbar");
  const _component_FilterSideBar = resolveComponent("FilterSideBar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800">${ssrInterpolate($setup.t("smartphones-android-title"))}</h1><div class="flex gap-5 px-8"><div class="w-1/4">`);
  _push(ssrRenderComponent(_component_FilterSideBar, {
    manufacturer: $props.manufacturer,
    subcategory: $props.subcategory,
    smartphone: $props.smartphone
  }, null, _parent));
  _push(`</div><div class="w-3/4">`);
  _push(ssrRenderComponent(_component_Product, {
    products: $props.products.data,
    category: $props.category,
    subcategory: $props.subcategory,
    manufacturer: $props.manufacturer
  }, null, _parent));
  _push(ssrRenderComponent(_component_Pagination, {
    links: $props.products.links
  }, null, _parent));
  _push(`</div></div></div>`);
}
const _sfc_setup$b = _sfc_main$b.setup;
_sfc_main$b.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Smartphones/androidPage.vue");
  return _sfc_setup$b ? _sfc_setup$b(props, ctx) : void 0;
};
const androidPage = /* @__PURE__ */ _export_sfc(_sfc_main$b, [["ssrRender", _sfc_ssrRender$9]]);
const __vite_glob_0_29 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: androidPage
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$a = {
  components: {
    navbar: Navbar,
    Product: Product$1,
    Pagination,
    FilterSideBar: _sfc_main$D
  },
  props: {
    products: {
      type: [Array, Object],
      default: () => []
    },
    Utilizador: {
      type: Object
    },
    buttons: {
      type: Array,
      required: true
    },
    isAdmin: {
      type: Boolean
    },
    category: {
      type: Array,
      required: true
    },
    subcategory: {
      type: Array,
      required: true
    },
    manufacturer: {
      type: Array,
      required: true
    },
    smartphone: {
      type: Array,
      default: () => []
    }
  },
  setup() {
    const { t } = useI18n();
    return { t };
  }
};
function _sfc_ssrRender$8(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_navbar = resolveComponent("navbar");
  const _component_FilterSideBar = resolveComponent("FilterSideBar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800">${ssrInterpolate($setup.t("smartphones-iphone-title"))}</h1><div class="flex gap-5 px-8"><div class="w-1/4">`);
  _push(ssrRenderComponent(_component_FilterSideBar, {
    manufacturer: $props.manufacturer,
    subcategory: $props.subcategory,
    smartphone: $props.smartphone
  }, null, _parent));
  _push(`</div><div class="w-3/4">`);
  _push(ssrRenderComponent(_component_Product, {
    products: $props.products.data,
    category: $props.category,
    subcategory: $props.subcategory,
    manufacturer: $props.manufacturer
  }, null, _parent));
  _push(ssrRenderComponent(_component_Pagination, {
    links: $props.products.links
  }, null, _parent));
  _push(`</div></div></div>`);
}
const _sfc_setup$a = _sfc_main$a.setup;
_sfc_main$a.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Smartphones/iphonePage.vue");
  return _sfc_setup$a ? _sfc_setup$a(props, ctx) : void 0;
};
const iphonePage = /* @__PURE__ */ _export_sfc(_sfc_main$a, [["ssrRender", _sfc_ssrRender$8]]);
const __vite_glob_0_30 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: iphonePage
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$9 = {
  components: {
    navbar: Navbar,
    Product: Product$1,
    Pagination,
    FilterSideBar: _sfc_main$D
  },
  props: {
    products: {
      type: [Array, Object],
      default: () => []
    },
    Utilizador: {
      type: Object
    },
    buttons: {
      type: Array,
      required: true
    },
    isAdmin: {
      type: Boolean
    },
    category: {
      type: Array,
      required: true
    },
    subcategory: {
      type: Array,
      required: true
    },
    manufacturer: {
      type: Array,
      required: true
    },
    smartphone: {
      type: Array,
      default: () => []
    }
  },
  setup() {
    const { t } = useI18n();
    return { t };
  }
};
function _sfc_ssrRender$7(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_navbar = resolveComponent("navbar");
  const _component_FilterSideBar = resolveComponent("FilterSideBar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800">${ssrInterpolate($setup.t("smartphones-page-title"))}</h1><div class="flex gap-5 px-8"><div class="w-1/4">`);
  _push(ssrRenderComponent(_component_FilterSideBar, {
    manufacturer: $props.manufacturer,
    subcategory: $props.subcategory,
    smartphone: $props.smartphone
  }, null, _parent));
  _push(`</div><div class="w-3/4">`);
  _push(ssrRenderComponent(_component_Product, {
    products: $props.products.data,
    category: $props.category,
    subcategory: $props.subcategory,
    manufacturer: $props.manufacturer
  }, null, _parent));
  _push(ssrRenderComponent(_component_Pagination, {
    links: $props.products.links
  }, null, _parent));
  _push(`</div></div></div>`);
}
const _sfc_setup$9 = _sfc_main$9.setup;
_sfc_main$9.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Smartphones/telemoveisPage.vue");
  return _sfc_setup$9 ? _sfc_setup$9(props, ctx) : void 0;
};
const telemoveisPage = /* @__PURE__ */ _export_sfc(_sfc_main$9, [["ssrRender", _sfc_ssrRender$7]]);
const __vite_glob_0_31 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: telemoveisPage
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$8 = {
  __name: "addUser",
  __ssrInlineRender: true,
  setup(__props) {
    const form = reactive({
      name: null,
      email: null,
      password: null
    });
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "max-w-2xl mx-auto p-6 mt-5" }, _attrs))}><h1 class="text-3xl font-bold mb-6 text-gray-800 text-center"> Registo </h1><form class="space-y-4"><div><label for="name" class="block mb-2 text-sm font-medium text-gray-700"> Nome </label><input id="name"${ssrRenderAttr("value", form.name)} class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition"></div><div><label for="price" class="block mb-2 text-sm font-medium text-gray-700"> Email: </label><input id="price"${ssrRenderAttr("value", form.email)} class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition"></div><div><label for="pass" class="block mb-2 text-sm font-medium text-gray-700"> Password: </label><input id="pass"${ssrRenderAttr("value", form.password)} class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition"></div><button type="submit" class="w-full bg-gray-700 hover:bg-gray-900 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out"> Registar </button><a href="/"><h1 class="font-bold mb-6 text-gray-800 text-center mt-5"> Página Inicial </h1></a></form></div>`);
    };
  }
};
const _sfc_setup$8 = _sfc_main$8.setup;
_sfc_main$8.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/addUser.vue");
  return _sfc_setup$8 ? _sfc_setup$8(props, ctx) : void 0;
};
const __vite_glob_0_32 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: _sfc_main$8
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$7 = {
  components: {
    Navbar
  },
  props: {
    DetalhesProduto: {
      type: Object,
      required: true
    },
    Buttons: {
      type: Array,
      required: true
    },
    Utilizador: {
      type: Object
    },
    isAdmin: {
      type: Boolean
    }
  },
  methods: {
    Desconto(promo) {
      const Discount = promo.price * (promo.sale_price / 100);
      const FinalDiscount = promo.price - Discount;
      return FinalDiscount.toFixed(2);
    }
  }
};
function _sfc_ssrRender$6(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_Navbar = resolveComponent("Navbar");
  _push(`<!--[-->`);
  _push(ssrRenderComponent(_component_Navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.Buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<div class="p-4"><h1 class="text-2xl font-bold mb-4">Detalhes do Produto</h1><div class="mb-4"><img${ssrRenderAttr("src", `/storage/${$props.DetalhesProduto.image_path}`)}${ssrRenderAttr("alt", $props.DetalhesProduto.name)} class="w-full h-64 object-contain rounded-lg transition delay-50 hover:scale-105"></div><p>Nome: ${ssrInterpolate($props.DetalhesProduto.name)}</p><p>Preço: ${ssrInterpolate($options.Desconto($props.DetalhesProduto))}€</p><p>Stock: ${ssrInterpolate($props.DetalhesProduto.stock)}</p><p>Detalhes do produto: ${ssrInterpolate($props.DetalhesProduto.description)}</p></div><!--]-->`);
}
const _sfc_setup$7 = _sfc_main$7.setup;
_sfc_main$7.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/detalhes-produto.vue");
  return _sfc_setup$7 ? _sfc_setup$7(props, ctx) : void 0;
};
const detalhesProduto = /* @__PURE__ */ _export_sfc(_sfc_main$7, [["ssrRender", _sfc_ssrRender$6]]);
const __vite_glob_0_33 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: detalhesProduto
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$6 = {};
function _sfc_ssrRender$5(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}><section class="bg-cyan-900 text-white py-16 sm:m-12 lg:m-12 mb-5 rounded-lg"><div class="container mx-auto text-center"><h2 class="text-4xl font-bold mb-4 drop-shadow-md"> BLACK FRIDAY </h2><p class="text-2xl mb-4">OFERTA LIMITADA</p><p class="text-6xl font-bold text-white mb-4 drop-shadow-md"> -50% </p><p class="text-xl mb-8 drop-shadow-md">EM TODOS OS PRODUTOS</p><button class="bg-white text-black px-8 py-3 rounded-full font-semibold hover:bg-gray-200 transition-colors duration-300"> VER CAMPANHA </button></div></section></div>`);
}
const _sfc_setup$6 = _sfc_main$6.setup;
_sfc_main$6.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/carroussel.vue");
  return _sfc_setup$6 ? _sfc_setup$6(props, ctx) : void 0;
};
const Carroussel = /* @__PURE__ */ _export_sfc(_sfc_main$6, [["ssrRender", _sfc_ssrRender$5]]);
const _sfc_main$5 = {
  props: {
    products: {
      type: [Array, Object],
      required: true
    },
    category: {
      type: Array,
      required: true
    },
    subcategory: {
      type: Array,
      required: true
    },
    manufacturer: {
      type: Array,
      required: true
    }
  },
  methods: {
    Desconto(promo) {
      const Discount = promo.price * (promo.sale_price / 100);
      const FinalDiscount = promo.price - Discount;
      return FinalDiscount.toFixed(2);
    },
    showCategories(category_id) {
      const category = this.category.find(
        (cate) => cate.id === category_id
      );
      return category.name;
    },
    showSubcategories(subcategory_id) {
      const subcategory = this.subcategory.find(
        (subcate) => subcate.id === subcategory_id
      );
      return subcategory.name;
    }
  }
};
function _sfc_ssrRender$4(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_fa = resolveComponent("fa");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "flex justify-center items-center p-5" }, _attrs))}><div class="w-full max-w-6xl max-h-6xl mx-auto"><ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6"><!--[-->`);
  ssrRenderList($props.products, (promo) => {
    _push(`<li class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col p-6"><div class="mb-4"><a${ssrRenderAttr("href", `/${promo.category.slug}/${promo.subcategory.slug}/${promo.slug}`)}><img${ssrRenderAttr("src", `/storage/${promo.image_path}`)}${ssrRenderAttr("alt", promo.name)} class="w-full h-56 object-contain rounded-lg transition delay-50 hover:scale-105"></a>`);
    if (promo.sale_price > 0) {
      _push(`<div class="text-right text-sm font-semibold text-red-500 lg:text-lg"> -${ssrInterpolate(promo.sale_price)}% </div>`);
    } else {
      _push(`<div class="invisible">${ssrInterpolate(promo.sale_price)}</div>`);
    }
    _push(`</div><div class="flex-grow"><h2 class="text-xs mb-2 text-gray-400">${ssrInterpolate($options.showCategories(promo.category_id))} ${ssrInterpolate($options.showSubcategories(promo.subcategory_id))}</h2></div><div class="flex-grow"><a${ssrRenderAttr("href", `/${promo.category.slug}/${promo.subcategory.slug}/${promo.slug}`)}><h2 class="truncate text-sm font-semibold mb-2 hover:text-blue-600">${ssrInterpolate(promo.name)}</h2></a></div><div class="flex-grow"><h2 class="truncate text-xs max-w-100 text-neutral-500">${ssrInterpolate(promo.description)}</h2></div><div class="mt-4 flex gap-5 items-center">`);
    if (promo.sale_price <= 0) {
      _push(`<span class="text-2xl mb-1 font-bold text-blue-600">${ssrInterpolate(promo.price)}€ </span>`);
    } else {
      _push(`<span class="text-2xl mb-1 font-bold text-red-600">${ssrInterpolate($options.Desconto(promo))}€ <span class="text-sm mb-1 text-neutral-400 line-through">${ssrInterpolate(promo.price)}€ </span></span>`);
    }
    _push(`</div><div class="flex gap-5 items-center">`);
    if (promo.stock <= 0) {
      _push(`<span class="text-md mb-1 font-bold text-red-600"><p>`);
      _push(ssrRenderComponent(_component_fa, {
        icon: "fa-solid fa-xmark",
        class: "text-red-600 mr-1"
      }, null, _parent));
      _push(`Sem Stock </p></span>`);
    } else if (promo.stock <= 10) {
      _push(`<span class="text-md font-bold text-yellow-600"><p>`);
      _push(ssrRenderComponent(_component_fa, {
        icon: "fa-solid fa-check",
        class: "text-yellow-600 mr-1"
      }, null, _parent));
      _push(`Poucas unidades </p></span>`);
    } else {
      _push(`<span class="text-md mb-1 font-bold text-emerald-400"><p>`);
      _push(ssrRenderComponent(_component_fa, {
        icon: "fa-solid fa-check",
        class: "text-emerald-400 mr-1"
      }, null, _parent));
      _push(`Em Stock </p></span>`);
    }
    _push(`</div><div class="flex items-center gap-2"><button class="bg-neutral-800 text-white px-4 py-2 hover:bg-blue-600 transition-colors duration-300 w-5/6"> Adicionar </button><button class="bg-neutral-400 text-white px-4 py-2 hover:bg-blue-700 transition-colors duration-300"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6" fill="white"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"></path></svg></button></div></li>`);
  });
  _push(`<!--]--></ul></div></div>`);
}
const _sfc_setup$5 = _sfc_main$5.setup;
_sfc_main$5.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Categories/HomeProductComponent.vue");
  return _sfc_setup$5 ? _sfc_setup$5(props, ctx) : void 0;
};
const Product = /* @__PURE__ */ _export_sfc(_sfc_main$5, [["ssrRender", _sfc_ssrRender$4]]);
const _sfc_main$4 = {
  props: {
    computers: {
      type: Array,
      required: true
    }
  },
  methods: {
    Desconto(promo) {
      const Discount = promo.price * (promo.sale_price / 100);
      const FinalDiscount = promo.price - Discount;
      return FinalDiscount.toFixed(2);
    }
  }
};
function _sfc_ssrRender$3(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_fa = resolveComponent("fa");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "flex justify-center items-center p-5" }, _attrs))}><div class="w-full max-w-6xl max-h-6xl mx-auto"><ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6"><!--[-->`);
  ssrRenderList($props.computers, (promo) => {
    _push(`<li class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col p-6"><div class="mb-4"><a${ssrRenderAttr("href", `/${promo.category.slug}/${promo.subcategory.slug}/${promo.slug}`)}><img${ssrRenderAttr("src", `/storage/${promo.image_path}`)}${ssrRenderAttr("alt", promo.name)} class="w-full h-56 object-contain rounded-lg transition delay-50 hover:scale-105"></a>`);
    if (promo.sale_price <= 0) {
      _push(`<div class="relative text-right px-2.5 py-1.5 rounded-r3 font-black text-sm text-red-600 lg:text-lg p-0"></div>`);
    } else {
      _push(`<div class="relative text-right px-2.5 py-1.5 rounded-r3 font-black text-sm text-red-500 lg:text-lg p-0"> -${ssrInterpolate(promo.sale_price)}% </div>`);
    }
    _push(`</div><div class="flex-grow"><h2 class="text-md mb-2 text-neutral-300">${ssrInterpolate(promo.category_id.name)} ${ssrInterpolate(promo.subcategory_id.name)}</h2></div><div class="flex-grow"><a${ssrRenderAttr("href", `/${promo.category.slug}/${promo.subcategory.slug}/${promo.slug}`)}><h2 class="truncate text-md font-semibold mb-2 hover:text-blue-600">${ssrInterpolate(promo.name)}</h2></a></div><div class="flex-grow"><h2 class="truncate text-xs text-neutral-500">${ssrInterpolate(promo.description)}</h2></div><div class="mt-4 flex gap-5 items-center">`);
    if (promo.sale_price <= 0) {
      _push(`<span class="text-2xl mb-1 font-bold text-blue-600">${ssrInterpolate(promo.price)}€ </span>`);
    } else {
      _push(`<span class="text-2xl mb-1 font-bold text-red-600">${ssrInterpolate($options.Desconto(promo))}€ <span class="text-sm mb-1 text-neutral-400 line-through">${ssrInterpolate(promo.price)}€ </span></span>`);
    }
    _push(`</div><div class="flex gap-5 items-center">`);
    if (promo.stock <= 0) {
      _push(`<span class="text-md mb-1 font-bold text-red-600"><p>`);
      _push(ssrRenderComponent(_component_fa, {
        icon: "fa-solid fa-xmark",
        class: "text-red-600 mr-1"
      }, null, _parent));
      _push(`Sem Stock </p></span>`);
    } else if (promo.stock <= 10) {
      _push(`<span class="text-md font-bold text-yellow-600"><p>`);
      _push(ssrRenderComponent(_component_fa, {
        icon: "fa-solid fa-check",
        class: "text-yellow-600 mr-1"
      }, null, _parent));
      _push(`Poucas unidades </p></span>`);
    } else {
      _push(`<span class="text-md mb-1 font-bold text-emerald-400"><p>`);
      _push(ssrRenderComponent(_component_fa, {
        icon: "fa-solid fa-check",
        class: "text-emerald-400 mr-1"
      }, null, _parent));
      _push(`Em Stock </p></span>`);
    }
    _push(`</div><div class="flex items-center gap-2"><button class="bg-neutral-800 text-white px-4 py-2 hover:bg-blue-600 transition-colors duration-300 w-5/6"> Adicionar </button><button class="bg-neutral-400 text-white px-4 py-2 hover:bg-blue-700 transition-colors duration-300"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6" fill="white"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"></path></svg></button></div></li>`);
  });
  _push(`<!--]--></ul></div></div>`);
}
const _sfc_setup$4 = _sfc_main$4.setup;
_sfc_main$4.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Categories/HomeComputerComponent.vue");
  return _sfc_setup$4 ? _sfc_setup$4(props, ctx) : void 0;
};
const ComputerHome = /* @__PURE__ */ _export_sfc(_sfc_main$4, [["ssrRender", _sfc_ssrRender$3]]);
const _sfc_main$3 = {
  components: {
    navbar: Navbar,
    Carroussel,
    Product,
    ComputerHome
  },
  props: {
    products: {
      type: Array,
      required: true
    },
    category: {
      type: Array,
      required: true
    },
    manufacturer: {
      type: Array,
      required: true
    },
    subcategory: {
      type: Array,
      required: true
    },
    computers: {
      type: Array,
      required: true
    },
    Utilizador: {
      type: Object
    },
    Buttons: {
      type: Array
    },
    isAdmin: {
      type: Boolean
    },
    searchProducts: {
      type: Array
    }
  },
  methods: {
    discountProductsShow() {
      const discountItems = this.products.filter(
        (item) => item.sale_price > 0
      );
      return discountItems;
    }
  }
};
function _sfc_ssrRender$2(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_navbar = resolveComponent("navbar");
  const _component_Carroussel = resolveComponent("Carroussel");
  const _component_Product = resolveComponent("Product");
  const _component_ComputerHome = resolveComponent("ComputerHome");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.Buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(ssrRenderComponent(_component_Carroussel, null, null, _parent));
  _push(`<h1 class="flex text-3xl mb-5 ml-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"> Promoções </h1>`);
  _push(ssrRenderComponent(_component_Product, {
    products: $options.discountProductsShow(),
    category: $props.category,
    subcategory: $props.subcategory,
    manufacturer: $props.manufacturer
  }, null, _parent));
  _push(`<div class="flex justify-center"><a href="http://localhost:8000/promocoes"><button class="bg-blue-600 text-white px-6 py-4 rounded-sm hover:bg-blue-800 transition-colors duration-300"> Ver todas as ofertas </button></a></div><div class="w-full bg-neutral-800"><div class="flex justify-center pt-20 mt-24"><h1 class="text-3xl font-bold text-white">Os nossos PC&#39;s</h1></div><div><p class="flex justify-center text-neutral-400 mt-2"> Preparado para levar o teu jogo ao proximo nível? Conhece os nossos PC&#39;s, com componentes cuidadosamente selecionados por nós. </p></div><div><span class="flex justify-center font-bold text-white">Desempenho extremo para jogadores exigentes </span></div><div class="flex justify-center m-4"><a href="/computadores"><button class="bg-white text-black px-6 py-4 rounded-sm hover:bg-gray-300 transition-colors duration-300 justify-center"> Ver todos </button></a></div><div class="pb-10">`);
  _push(ssrRenderComponent(_component_ComputerHome, { computers: $props.computers }, null, _parent));
  _push(`</div></div><div class="m-10"><div class="flex justify-center"><a href="http://localhost:8000/promocoes"><button class="bg-blue-600 text-white px-6 py-4 rounded-sm hover:bg-blue-800 transition-colors duration-300"> Ver todas as ofertas </button></a></div></div></div>`);
}
const _sfc_setup$3 = _sfc_main$3.setup;
_sfc_main$3.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/home.vue");
  return _sfc_setup$3 ? _sfc_setup$3(props, ctx) : void 0;
};
const home = /* @__PURE__ */ _export_sfc(_sfc_main$3, [["ssrRender", _sfc_ssrRender$2]]);
const __vite_glob_0_34 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: home
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$2 = {
  __name: "loginUser",
  __ssrInlineRender: true,
  setup(__props) {
    const form = reactive({
      email: null,
      password: null
    });
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "max-w-2xl mx-auto p-6 mt-5" }, _attrs))}><h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">Login</h1><form class="space-y-4"><div><label for="price" class="block mb-2 text-sm font-medium text-gray-700"> Email: </label><input id="price"${ssrRenderAttr("value", form.email)} class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition"></div><div><label for="pass" class="block mb-2 text-sm font-medium text-gray-700"> Password: </label><input id="pass"${ssrRenderAttr("value", form.password)} class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition"></div><button type="submit" class="w-full bg-gray-700 hover:bg-gray-900 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out"> Login </button><a href="/"><h1 class="font-bold mb-6 text-gray-800 text-center mt-5"> Página Inicial </h1></a></form></div>`);
    };
  }
};
const _sfc_setup$2 = _sfc_main$2.setup;
_sfc_main$2.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/loginUser.vue");
  return _sfc_setup$2 ? _sfc_setup$2(props, ctx) : void 0;
};
const __vite_glob_0_35 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: _sfc_main$2
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$1 = {
  components: {
    Navbar,
    Products: Product$1,
    Pagination,
    discountFilterNavbar: _sfc_main$D
  },
  props: {
    products: {
      type: [Object, Array],
      default: () => []
    },
    category: {
      type: Array,
      required: true
    },
    subcategory: {
      type: Array,
      required: true
    },
    manufacturer: {
      type: Array,
      required: true
    },
    Utilizador: {
      type: Object
    },
    buttons: {
      type: Array,
      required: true
    },
    isAdmin: {
      type: Boolean
    }
  }
};
function _sfc_ssrRender$1(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_navbar = resolveComponent("navbar");
  const _component_discountFilterNavbar = resolveComponent("discountFilterNavbar");
  const _component_Products = resolveComponent("Products");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100 min-h-screen" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"> Promoções </h1><div class="flex gap-5 px-8"><div class="w-1/4">`);
  _push(ssrRenderComponent(_component_discountFilterNavbar, {
    manufacturer: $props.manufacturer,
    products: $props.products.data,
    category: $props.category
  }, null, _parent));
  _push(`</div><div class="w-3/4">`);
  _push(ssrRenderComponent(_component_Products, {
    products: $props.products.data,
    category: $props.category,
    subcategory: $props.subcategory,
    manufacturer: $props.manufacturer
  }, null, _parent));
  _push(ssrRenderComponent(_component_Pagination, {
    links: $props.products.links
  }, null, _parent));
  _push(`</div></div></div>`);
}
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/promoPage.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const promoPage = /* @__PURE__ */ _export_sfc(_sfc_main$1, [["ssrRender", _sfc_ssrRender$1]]);
const __vite_glob_0_36 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: promoPage
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main = {
  components: {
    Product: Product$1,
    Navbar,
    Pagination
  },
  props: {
    searchProducts: {
      type: [Object, Array],
      default: () => []
    },
    category: {
      type: Array,
      required: true
    },
    subcategory: {
      type: Array,
      required: true
    },
    Utilizador: {
      type: Object
    },
    Buttons: {
      type: Array
    },
    isAdmin: {
      type: Boolean
    },
    query: {
      type: String,
      required: true
    }
  }
};
function _sfc_ssrRender(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_Navbar = resolveComponent("Navbar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_Navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.Buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"> Resultados da pesquisa: ${ssrInterpolate($props.query)}</h1>`);
  _push(ssrRenderComponent(_component_Product, {
    products: $props.searchProducts.data,
    category: $props.category,
    subcategory: $props.subcategory
  }, null, _parent));
  _push(ssrRenderComponent(_component_Pagination, {
    links: $props.searchProducts.links
  }, null, _parent));
  _push(`</div>`);
}
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/search.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
const search = /* @__PURE__ */ _export_sfc(_sfc_main, [["ssrRender", _sfc_ssrRender]]);
const __vite_glob_0_37 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: search
}, Symbol.toStringTag, { value: "Module" }));
library.add(fas);
createServer(
  (page) => createInertiaApp({
    page,
    render: renderToString,
    resolve: (name) => {
      const pages = /* @__PURE__ */ Object.assign({ "./Pages/Acessorios/AcessoriosPcPage.vue": __vite_glob_0_0, "./Pages/Acessorios/AcessoriosSmartPhonePage.vue": __vite_glob_0_1, "./Pages/Acessorios/AcessorioscasaPage.vue": __vite_glob_0_2, "./Pages/Acessorios/acessoriosPage.vue": __vite_glob_0_3, "./Pages/Admin/Products/addProduto.vue": __vite_glob_0_4, "./Pages/Admin/Products/deleteProduto.vue": __vite_glob_0_5, "./Pages/Admin/Products/updateProduto.vue": __vite_glob_0_6, "./Pages/Admin/Products/viewProducts.vue": __vite_glob_0_7, "./Pages/Admin/adminPage.vue": __vite_glob_0_8, "./Pages/ComponentesPC/armazenamentoPage.vue": __vite_glob_0_9, "./Pages/ComponentesPC/caixasPcPage.vue": __vite_glob_0_10, "./Pages/ComponentesPC/componentePcPage.vue": __vite_glob_0_11, "./Pages/ComponentesPC/cpu-coolPage.vue": __vite_glob_0_12, "./Pages/ComponentesPC/cpuPage.vue": __vite_glob_0_13, "./Pages/ComponentesPC/fontePage.vue": __vite_glob_0_14, "./Pages/ComponentesPC/gpuPage.vue": __vite_glob_0_15, "./Pages/ComponentesPC/motherboardsPage.vue": __vite_glob_0_16, "./Pages/ComponentesPC/ramPage.vue": __vite_glob_0_17, "./Pages/Computadores/DesktopPage.vue": __vite_glob_0_18, "./Pages/Computadores/GamingPage.vue": __vite_glob_0_19, "./Pages/Computadores/LaptopPage.vue": __vite_glob_0_20, "./Pages/Computadores/MicroPcPage.vue": __vite_glob_0_21, "./Pages/Computadores/computadoresPage.vue": __vite_glob_0_22, "./Pages/Computadores/workstationPage.vue": __vite_glob_0_23, "./Pages/Perifericos/MonitorPage.vue": __vite_glob_0_24, "./Pages/Perifericos/PCAudioPage.vue": __vite_glob_0_25, "./Pages/Perifericos/RatoTecladoPage.vue": __vite_glob_0_26, "./Pages/Perifericos/VideoPage.vue": __vite_glob_0_27, "./Pages/Perifericos/perifericosPage.vue": __vite_glob_0_28, "./Pages/Smartphones/androidPage.vue": __vite_glob_0_29, "./Pages/Smartphones/iphonePage.vue": __vite_glob_0_30, "./Pages/Smartphones/telemoveisPage.vue": __vite_glob_0_31, "./Pages/addUser.vue": __vite_glob_0_32, "./Pages/detalhes-produto.vue": __vite_glob_0_33, "./Pages/home.vue": __vite_glob_0_34, "./Pages/loginUser.vue": __vite_glob_0_35, "./Pages/promoPage.vue": __vite_glob_0_36, "./Pages/search.vue": __vite_glob_0_37 });
      return pages[`./Pages/${name}.vue`];
    },
    setup({ App, props, plugin }) {
      const server = createSSRApp({
        render: () => h(App, props)
      });
      server.component("fa", FontAwesomeIcon);
      server.use(plugin);
      return server;
    }
  })
);
