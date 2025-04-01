import { ref, mergeProps, useSSRContext, resolveComponent, onMounted, onUnmounted, reactive, createSSRApp, h } from "vue";
import { ssrRenderAttrs, ssrRenderAttr, ssrRenderList, ssrInterpolate, ssrRenderComponent, ssrGetDynamicModelProps, ssrIncludeBooleanAttr, ssrLooseContain, ssrLooseEqual } from "vue/server-renderer";
import { Link, createInertiaApp } from "@inertiajs/vue3";
import createServer from "@inertiajs/vue3/server";
import { renderToString } from "@vue/server-renderer";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { library } from "@fortawesome/fontawesome-svg-core";
import { fas } from "@fortawesome/free-solid-svg-icons";
const _sfc_main$O = {
  __name: "navbarSearch",
  __ssrInlineRender: true,
  setup(__props) {
    const query = ref("");
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "hidden md:block relative w-64" }, _attrs))}><input type="text"${ssrRenderAttr("value", query.value)} placeholder="O que procuras?" class="mt-3 w-64 px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"></div>`);
    };
  }
};
const _sfc_setup$O = _sfc_main$O.setup;
_sfc_main$O.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Inputs/Navbar/navbarSearch.vue");
  return _sfc_setup$O ? _sfc_setup$O(props, ctx) : void 0;
};
const _export_sfc = (sfc, props) => {
  const target = sfc.__vccOpts || sfc;
  for (const [key, val] of props) {
    target[key] = val;
  }
  return target;
};
const _sfc_main$N = {
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
const _sfc_setup$N = _sfc_main$N.setup;
_sfc_main$N.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Buttons/Navbar/navbarButtons.vue");
  return _sfc_setup$N ? _sfc_setup$N(props, ctx) : void 0;
};
const navbarButtons = /* @__PURE__ */ _export_sfc(_sfc_main$N, [["ssrRender", _sfc_ssrRender$G]]);
const _sfc_main$M = {
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
const _sfc_setup$M = _sfc_main$M.setup;
_sfc_main$M.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Buttons/Navbar/userButton.vue");
  return _sfc_setup$M ? _sfc_setup$M(props, ctx) : void 0;
};
const userButton = /* @__PURE__ */ _export_sfc(_sfc_main$M, [["ssrRender", _sfc_ssrRender$F]]);
const __default__$4 = {};
const _sfc_main$L = /* @__PURE__ */ Object.assign(__default__$4, {
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
const _sfc_setup$L = _sfc_main$L.setup;
_sfc_main$L.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Inputs/Navbar/navbarSearchMobile.vue");
  return _sfc_setup$L ? _sfc_setup$L(props, ctx) : void 0;
};
const _sfc_main$K = {
  components: {
    NavbarSearchMobile: _sfc_main$L
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
const _sfc_setup$K = _sfc_main$K.setup;
_sfc_main$K.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Menu/Mobile/navbarMenuMobile.vue");
  return _sfc_setup$K ? _sfc_setup$K(props, ctx) : void 0;
};
const NavbarMenuMobile = /* @__PURE__ */ _export_sfc(_sfc_main$K, [["ssrRender", _sfc_ssrRender$E]]);
const _sfc_main$J = {
  components: {
    NavbarSearch: _sfc_main$O,
    NavbarSearchMobile: _sfc_main$L,
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
const _sfc_setup$J = _sfc_main$J.setup;
_sfc_main$J.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/navbar.vue");
  return _sfc_setup$J ? _sfc_setup$J(props, ctx) : void 0;
};
const Navbar = /* @__PURE__ */ _export_sfc(_sfc_main$J, [["ssrRender", _sfc_ssrRender$D]]);
const __default__$3 = {
  props: {
    manufacturer: {
      type: Array,
      required: true
    },
    products: {
      type: Array,
      required: true
    },
    category: {
      type: Array,
      required: true
    }
  }
};
const _sfc_main$I = /* @__PURE__ */ Object.assign(__default__$3, {
  __name: "navbar",
  __ssrInlineRender: true,
  setup(__props) {
    const isOpen = ref(false);
    const selectedFilters = ref({
      manufacturer: "",
      stock: "",
      nostock: "",
      category: ""
    });
    const closeSidebar = (event) => {
      if (!event.target.closest(".sidebar") && window.innerWidth < 1024) {
        isOpen.value = false;
      }
    };
    onMounted(() => document.addEventListener("click", closeSidebar));
    onUnmounted(() => document.removeEventListener("click", closeSidebar));
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "mt-8 h-screen w-full bg-white shadow-lg p-4" }, _attrs))} data-v-1cb5f128><h2 class="text-lg font-semibold mb-4" data-v-1cb5f128>Filtros</h2><div class="mt-4" data-v-1cb5f128><label class="block text-sm font-medium mb-1" data-v-1cb5f128>Stock</label><div class="flex items-center space-x-4" data-v-1cb5f128><label class="inline-flex items-center" data-v-1cb5f128><input type="checkbox"${ssrIncludeBooleanAttr(Array.isArray(selectedFilters.value.stock) ? ssrLooseContain(selectedFilters.value.stock, null) : selectedFilters.value.stock) ? " checked" : ""} class="form-checkbox" data-v-1cb5f128><span class="ml-2" data-v-1cb5f128>Em stock</span></label><label class="inline-flex items-center" data-v-1cb5f128><input type="checkbox"${ssrIncludeBooleanAttr(Array.isArray(selectedFilters.value.nostock) ? ssrLooseContain(selectedFilters.value.nostock, null) : selectedFilters.value.nostock) ? " checked" : ""} class="form-checkbox" data-v-1cb5f128><span class="ml-2" data-v-1cb5f128>Sem Stock</span></label></div></div><div class="mt-4" data-v-1cb5f128><label class="block text-sm font-medium mb-1" data-v-1cb5f128>Fabricante</label><select class="w-full border p-2 rounded" data-v-1cb5f128><!--[-->`);
      ssrRenderList(__props.manufacturer, (manu) => {
        _push(`<option${ssrRenderAttr("value", manu.id)} data-v-1cb5f128${ssrIncludeBooleanAttr(Array.isArray(selectedFilters.value.manufacturer) ? ssrLooseContain(selectedFilters.value.manufacturer, manu.id) : ssrLooseEqual(selectedFilters.value.manufacturer, manu.id)) ? " selected" : ""}>${ssrInterpolate(manu.name)}</option>`);
      });
      _push(`<!--]--></select></div><div class="mt-4" data-v-1cb5f128><label class="block text-sm font-medium mb-1" data-v-1cb5f128>Categoria</label><select class="w-full border p-2 rounded" data-v-1cb5f128><!--[-->`);
      ssrRenderList(__props.category, (cate) => {
        _push(`<option${ssrRenderAttr("value", cate.id)} data-v-1cb5f128${ssrIncludeBooleanAttr(Array.isArray(selectedFilters.value.category) ? ssrLooseContain(selectedFilters.value.category, cate.id) : ssrLooseEqual(selectedFilters.value.category, cate.id)) ? " selected" : ""}>${ssrInterpolate(cate.name)}</option>`);
      });
      _push(`<!--]--></select></div><button class="mt-4 w-full bg-blue-500 hover:bg-blue-700 text-white py-2 rounded" data-v-1cb5f128> Aplicar Filtros </button></div>`);
    };
  }
});
const _sfc_setup$I = _sfc_main$I.setup;
_sfc_main$I.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Inputs/FilterSideBar/navbar.vue");
  return _sfc_setup$I ? _sfc_setup$I(props, ctx) : void 0;
};
const FilterSideBar = /* @__PURE__ */ _export_sfc(_sfc_main$I, [["__scopeId", "data-v-1cb5f128"]]);
const _sfc_main$H = {
  components: {
    FilterSideBar
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
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "mt-8 flex justify-center items-center ml-5 p-5" }, _attrs))}><div class="w-full max-w-6xl max-h-6xl mx-auto"><ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6"><!--[-->`);
  ssrRenderList($props.products, (promo) => {
    _push(`<li class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col p-6"><div class="mb-4"><a${ssrRenderAttr("href", `/${promo.category.slug}/${promo.subcategory.slug}/${promo.slug}`)}><img${ssrRenderAttr("src", `/storage/${promo.image_path}`)}${ssrRenderAttr("alt", promo.name)} class="w-full h-56 object-contain rounded-lg transition delay-50 hover:scale-105"></a>`);
    if (promo.sale_price > 0) {
      _push(`<div class="text-right text-sm font-semibold text-red-500 lg:text-lg"> -${ssrInterpolate(promo.sale_price)}% </div>`);
    } else {
      _push(`<div class="invisible">${ssrInterpolate(promo.sale_price)}</div>`);
    }
    _push(`</div><div class="flex-grow"><h2 class="text-xs mb-2 text-gray-400">${ssrInterpolate($options.showCategories(promo.category_id))} ${ssrInterpolate($options.showSubcategories(promo.subcategory_id))}</h2></div><div class="flex-grow"><a${ssrRenderAttr("href", `/${promo.category.slug}/${promo.subcategory.slug}/${promo.slug}`)}><h2 class="text-sm font-semibold mb-2 hover:text-blue-600">${ssrInterpolate(promo.name)}</h2></a></div><div class="flex-grow"><h2 class="truncate text-xs max-w-100 text-neutral-500">${ssrInterpolate(promo.description)}</h2></div><div class="mt-4 flex gap-5 items-center">`);
    if (promo.sale_price <= 0) {
      _push(`<span class="text-2xl mb-1 font-bold text-blue-600">${ssrInterpolate(promo.price)}€ </span>`);
    } else {
      _push(`<span class="text-2xl mb-1 font-bold text-red-600">${ssrInterpolate($options.Desconto(promo))}€ <span class="text-sm mb-1 text-neutral-400 line-through">${ssrInterpolate(promo.price)}€ </span></span>`);
    }
    _push(`</div><div class="flex gap-5 items-center">`);
    if (promo.stock <= 0) {
      _push(`<span class="text-md mb-1 font-bold text-red-600"><p>Sem Stock</p></span>`);
    } else if (promo.stock <= 10) {
      _push(`<span class="text-md font-bold text-yellow-600"><p>Poucas unidades</p></span>`);
    } else {
      _push(`<span class="text-md mb-1 font-bold text-emerald-400"><p>Em Stock</p></span>`);
    }
    _push(`</div><div class="flex items-center gap-2"><button class="bg-neutral-800 text-white px-4 py-2 hover:bg-blue-600 transition-colors duration-300 w-5/6"> Adicionar </button><button class="bg-neutral-400 text-white px-4 py-2 hover:bg-blue-700 transition-colors duration-300"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6" fill="white"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"></path></svg></button></div></li>`);
  });
  _push(`<!--]--></ul></div></div>`);
}
const _sfc_setup$H = _sfc_main$H.setup;
_sfc_main$H.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Categories/productComponent.vue");
  return _sfc_setup$H ? _sfc_setup$H(props, ctx) : void 0;
};
const Product$1 = /* @__PURE__ */ _export_sfc(_sfc_main$H, [["ssrRender", _sfc_ssrRender$C]]);
const _sfc_main$G = {
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
const _sfc_setup$G = _sfc_main$G.setup;
_sfc_main$G.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Inputs/Pagination/paginate.vue");
  return _sfc_setup$G ? _sfc_setup$G(props, ctx) : void 0;
};
const Pagination = /* @__PURE__ */ _export_sfc(_sfc_main$G, [["ssrRender", _sfc_ssrRender$B]]);
const _sfc_main$F = {
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
const _sfc_setup$F = _sfc_main$F.setup;
_sfc_main$F.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Acessorios/AcessoriosPcPage.vue");
  return _sfc_setup$F ? _sfc_setup$F(props, ctx) : void 0;
};
const AcessoriosPcPage = /* @__PURE__ */ _export_sfc(_sfc_main$F, [["ssrRender", _sfc_ssrRender$A]]);
const __vite_glob_0_0 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: AcessoriosPcPage
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$E = {
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
const _sfc_setup$E = _sfc_main$E.setup;
_sfc_main$E.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Acessorios/AcessoriosSmartPhonePage.vue");
  return _sfc_setup$E ? _sfc_setup$E(props, ctx) : void 0;
};
const AcessoriosSmartPhonePage = /* @__PURE__ */ _export_sfc(_sfc_main$E, [["ssrRender", _sfc_ssrRender$z]]);
const __vite_glob_0_1 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: AcessoriosSmartPhonePage
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$D = {
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
const _sfc_setup$D = _sfc_main$D.setup;
_sfc_main$D.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Acessorios/AcessorioscasaPage.vue");
  return _sfc_setup$D ? _sfc_setup$D(props, ctx) : void 0;
};
const AcessorioscasaPage = /* @__PURE__ */ _export_sfc(_sfc_main$D, [["ssrRender", _sfc_ssrRender$y]]);
const __vite_glob_0_2 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: AcessorioscasaPage
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$C = {
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
function _sfc_ssrRender$x(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_Navbar = resolveComponent("Navbar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_Navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"> Acessórios </h1>`);
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
    }
  }
};
const _sfc_main$A = /* @__PURE__ */ Object.assign(__default__$2, {
  __name: "addProduto",
  __ssrInlineRender: true,
  setup(__props) {
    const form = reactive({
      name: "",
      manufacturer: "",
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
      _push(`<div class="max-w-2xl mx-auto p-6 mt-5"><h1 class="text-3xl font-bold mb-6 text-gray-800 text-center"> Adicionar Produtos </h1><form class="space-y-4"><div><label for="name" class="block mb-2 text-sm font-medium text-gray-700"> Nome do produto: </label><input id="name"${ssrRenderAttr("value", form.name)} class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition" autocomplete="name"></div><div><label for="manufacturer" class="block mb-2 text-sm font-medium text-gray-700"> Fabricante: </label><input id="manufacturer"${ssrRenderAttr("value", form.manufacturer)} class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition" autocomplete="manufacturer"></div><div><label for="price" class="block mb-2 text-sm font-medium text-gray-700"> Preço: </label><input id="price" type="number" step="0.01"${ssrRenderAttr("value", form.price)} class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition"></div><div><label for="price" class="block mb-2 text-sm font-medium text-gray-700"> % de Desconto: </label><input id="sale_price" type="number"${ssrRenderAttr("value", form.sale_price)} class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition"></div>`);
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
function _sfc_ssrRender$t(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_Navbar = resolveComponent("Navbar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_Navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"> Armazenamento </h1>`);
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
function _sfc_ssrRender$s(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_Navbar = resolveComponent("Navbar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_Navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"> Caixas de Computadores </h1>`);
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
function _sfc_ssrRender$r(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_Navbar = resolveComponent("Navbar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_Navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"> Componentes para Computador </h1>`);
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
function _sfc_ssrRender$q(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_Navbar = resolveComponent("Navbar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_Navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"> CPU Coolers </h1>`);
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
function _sfc_ssrRender$p(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_Navbar = resolveComponent("Navbar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_Navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"> Processadores </h1>`);
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
function _sfc_ssrRender$o(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_Navbar = resolveComponent("Navbar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_Navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"> Fontes de alimentação </h1>`);
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
function _sfc_ssrRender$n(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_Navbar = resolveComponent("Navbar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_Navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"> Placas Gráficas </h1>`);
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
function _sfc_ssrRender$m(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_Navbar = resolveComponent("Navbar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_Navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"> Motherboards </h1>`);
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
function _sfc_ssrRender$l(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_Navbar = resolveComponent("Navbar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_Navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"> Memórias RAM </h1>`);
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
    Pagination
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
    }
  }
};
function _sfc_ssrRender$g(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_navbar = resolveComponent("navbar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"> Computadores MaRca </h1>`);
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
function _sfc_ssrRender$a(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_Navbar = resolveComponent("Navbar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_Navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"> Periféricos </h1>`);
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
function _sfc_ssrRender$9(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_Navbar = resolveComponent("Navbar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_Navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"> Telemóveis Android </h1>`);
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
function _sfc_ssrRender$8(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_Navbar = resolveComponent("Navbar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_Navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"> Telemóveis Iphone </h1>`);
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
function _sfc_ssrRender$7(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  const _component_Navbar = resolveComponent("Navbar");
  const _component_Product = resolveComponent("Product");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_Navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"> Telemóveis </h1>`);
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
  components: {
    FilterNavbar: FilterSideBar
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
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "flex justify-center items-center p-5" }, _attrs))}><div class="w-full max-w-6xl max-h-6xl mx-auto"><ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6"><!--[-->`);
  ssrRenderList($props.products, (promo) => {
    _push(`<li class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col p-6"><div class="mb-4"><a${ssrRenderAttr("href", `/${promo.category.slug}/${promo.subcategory.slug}/${promo.slug}`)}><img${ssrRenderAttr("src", `/storage/${promo.image_path}`)}${ssrRenderAttr("alt", promo.name)} class="w-full h-56 object-contain rounded-lg transition delay-50 hover:scale-105"></a>`);
    if (promo.sale_price > 0) {
      _push(`<div class="text-right text-sm font-semibold text-red-500 lg:text-lg"> -${ssrInterpolate(promo.sale_price)}% </div>`);
    } else {
      _push(`<div class="invisible">${ssrInterpolate(promo.sale_price)}</div>`);
    }
    _push(`</div><div class="flex-grow"><h2 class="text-xs mb-2 text-gray-400">${ssrInterpolate($options.showCategories(promo.category_id))} ${ssrInterpolate($options.showSubcategories(promo.subcategory_id))}</h2></div><div class="flex-grow"><a${ssrRenderAttr("href", `/${promo.category.slug}/${promo.subcategory.slug}/${promo.slug}`)}><h2 class="text-sm font-semibold mb-2 hover:text-blue-600">${ssrInterpolate(promo.name)}</h2></a></div><div class="flex-grow"><h2 class="truncate text-xs max-w-100 text-neutral-500">${ssrInterpolate(promo.description)}</h2></div><div class="mt-4 flex gap-5 items-center">`);
    if (promo.sale_price <= 0) {
      _push(`<span class="text-2xl mb-1 font-bold text-blue-600">${ssrInterpolate(promo.price)}€ </span>`);
    } else {
      _push(`<span class="text-2xl mb-1 font-bold text-red-600">${ssrInterpolate($options.Desconto(promo))}€ <span class="text-sm mb-1 text-neutral-400 line-through">${ssrInterpolate(promo.price)}€ </span></span>`);
    }
    _push(`</div><div class="flex gap-5 items-center">`);
    if (promo.stock <= 0) {
      _push(`<span class="text-md mb-1 font-bold text-red-600"><p>Sem Stock</p></span>`);
    } else if (promo.stock <= 10) {
      _push(`<span class="text-md font-bold text-yellow-600"><p>Poucas unidades</p></span>`);
    } else {
      _push(`<span class="text-md mb-1 font-bold text-emerald-400"><p>Em Stock</p></span>`);
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
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "flex justify-center items-center p-5" }, _attrs))}><div class="w-full max-w-6xl max-h-6xl mx-auto"><ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6"><!--[-->`);
  ssrRenderList($props.computers, (promo) => {
    _push(`<li class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col p-6"><div class="mb-4"><a${ssrRenderAttr("href", `/${promo.category.slug}/${promo.subcategory.slug}/${promo.slug}`)}><img${ssrRenderAttr("src", `/storage/${promo.image_path}`)}${ssrRenderAttr("alt", promo.name)} class="w-full h-56 object-contain rounded-lg transition delay-50 hover:scale-105"></a>`);
    if (promo.sale_price <= 0) {
      _push(`<div class="relative text-right px-2.5 py-1.5 rounded-r3 font-black text-sm text-red-600 lg:text-lg p-0"></div>`);
    } else {
      _push(`<div class="relative text-right px-2.5 py-1.5 rounded-r3 font-black text-sm text-red-500 lg:text-lg p-0"> -${ssrInterpolate(promo.sale_price)}% </div>`);
    }
    _push(`</div><div class="flex-grow"><h2 class="text-md mb-2 text-neutral-300">${ssrInterpolate(promo.category_id.name)} ${ssrInterpolate(promo.subcategory_id.name)}</h2></div><div class="flex-grow"><a${ssrRenderAttr("href", `/${promo.category.slug}/${promo.subcategory.slug}/${promo.slug}`)}><h2 class="text-md font-semibold mb-2 hover:text-blue-600">${ssrInterpolate(promo.name)}</h2></a></div><div class="flex-grow"><h2 class="text-xs text-neutral-500">${ssrInterpolate(promo.description)}</h2></div><div class="mt-4 flex gap-5 items-center">`);
    if (promo.sale_price <= 0) {
      _push(`<span class="text-2xl mb-1 font-bold text-blue-600">${ssrInterpolate(promo.price)}€ </span>`);
    } else {
      _push(`<span class="text-2xl mb-1 font-bold text-red-600">${ssrInterpolate($options.Desconto(promo))}€ <span class="text-sm mb-1 text-neutral-400 line-through">${ssrInterpolate(promo.price)}€ </span></span>`);
    }
    _push(`</div><div class="flex gap-5 items-center">`);
    if (promo.stock <= 0) {
      _push(`<span class="text-md mb-1 font-bold text-red-600"><p>Sem Stock</p></span>`);
    } else if (promo.stock <= 10) {
      _push(`<span class="text-md font-bold text-yellow-600"><p>Poucas unidades</p></span>`);
    } else {
      _push(`<span class="text-md mb-1 font-bold text-emerald-400"><p>Em Stock</p></span>`);
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
    FilterSideBar
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
  const _component_FilterSideBar = resolveComponent("FilterSideBar");
  const _component_Products = resolveComponent("Products");
  const _component_Pagination = resolveComponent("Pagination");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-zinc-100 min-h-screen" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_navbar, {
    Utilizador: $props.Utilizador,
    Buttons: $props.buttons,
    isAdmin: $props.isAdmin
  }, null, _parent));
  _push(`<h1 class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"> Promoções </h1><div class="flex gap-5 px-8"><div class="w-1/4">`);
  _push(ssrRenderComponent(_component_FilterSideBar, {
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
  _push(`</div></div>`);
  _push(ssrRenderComponent(_component_Pagination, {
    links: $props.products.links
  }, null, _parent));
  _push(`</div>`);
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
    // setup({ App, props, plugin }) {
    //     return createSSRApp({
    //         render: () => h(App, props),
    //     }).use(plugin);
    // },
  })
);
